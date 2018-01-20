<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StadisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_cost = Product::orderBy('created_at', 'ASC')->pluck('price')->toJson();

        $products_count = Product::count();

        $date = Carbon::now()->subWeek(1);

        $orders = Order::where('status', 'ended')
            ->where('created_at', '>', $date)
            ->get();

        //Datos de las ordenes que se encontraron
        $total_cost = 0;
        $total = 0;
        $total_servicios = 0;

        foreach ($orders as $order) {
            $total_cost = $total_cost + $order->total_cost;
            $total = $total + $order->total;
            $total_servicios = $total_servicios + $order->services()->count();
        }

        //Fin
        $days_total_cost = $this->calculatePieCharData();
        $days_total = $this->calculateTotalPieCharData();

        // Fin

        //Contando datos
        $total_ordenes = Order::count();
        $concretas = Order::where('status', 'ended')->count();
        $total_products = Product::all();
        $total_productos = $total_products->sum('stock');
        $total_costos = $this->countTotalProducts($total_products);

        return view('stadistics.index', compact('total_cost',
            'products_count',
            'orders',
            'total',
            'total_ordenes',
            'concretas',
            'total_servicios',
            'days_total_cost',
            'days_total',
            'total_productos',
            'total_costos'
        ));
    }


    public function countTotalProducts($products)
    {
        $total = 0;

//            foreach ($products as $product) {
//                $total = $total + $product->pivot->price * $product->pivot->quantity;
//            }

        return $total;
    }

    public function searcher()
    {
        session(['back' => 'stadistics.searcher']);

        $brands = Vehicle::orderBy('brand', 'ASC')->pluck('brand', 'brand')->all();
        $models = Vehicle::orderBy('model', 'ASC')->pluck('model', 'model')->all();
        $clients = User::where('role', 'client')->orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('stadistics.searcher', compact('brands', 'models', 'clients'));
    }

    public function search(Request $request)
    {
        $brand = $request->get('brand');
        $model = $request->get('model');
        $status = $request->get('status');
        $km_min = $request->get('km_min');
        $km_max = $request->get('km_max');
        $paid = $request->get('paid');
        $dates = $request->get('date');

        $query = DB::table('orders')->select('*');


        if ($brand != null || $model != null) {

            $query->join('vehicles', 'orders.vehicle_id', '=', 'vehicles.id');
        }

        if ($model != null) {

            $query->where('vehicles.model', $model);
        }

        if ($brand != null) {

            $query->where('vehicles.brand', $brand);
        }

        if ($status != 'all') {

            $query->where('status', $status);
        }

        if ($km_min != null) {

            $query->where('orders.km', '>', $km_min);
        }

        if ($km_max != null) {

            $query->where('orders.km', '<', $km_max);
        }

        if ($paid != 'all') {

            $query->where('orders.paid', $paid);
        }

        if ($dates != null) {
            //Otener fecha inicio y fin
            $dates = explode(' - ', $dates);
            $ini_date = Carbon::createFromFormat('d/m/Y', $dates[0]);
            $end_date = Carbon::createFromFormat('d/m/Y', $dates[1]);
            //fin
                $query->whereBetween('orders.created_at', [$ini_date, $end_date]);
        }


        $query->join('users', 'orders.user_id', '=', 'users.id');


        $orders = $query->get();

        return view('stadistics.searched', compact('orders'));
    }

    public function store(Request $request)
    {
        //Otener fecha inicio y fin
        $dates = explode(' - ', $request->get('date'));
        $ini_date = Carbon::createFromFormat('d/m/Y', $dates[0]);
        $end_date = Carbon::createFromFormat('d/m/Y', $dates[1]);
        //fin

        $orders = Order::where('status', '<>', 'budget')
            ->whereBetween('created_at', [$ini_date, $end_date])
            ->get();

        //Datos de las ordenes que se encontraron
        $total_cost = 0;
        $total = 0;
        $total_servicios = 0;

        foreach ($orders as $order) {
            $total_cost = $total_cost + $order->total_cost;
            $total = $total + $order->total;
            $total_servicios = $total_servicios + $order->services()->count();
        }
        //Fin

        //Contando datos
        $total_ordenes = Order::count();
        $concretas = Order::where('status', 'ended')->count();


        return view('stadistics.show', compact('total_cost',
            'products_count',
            'orders',
            'total',
            'total_ordenes',
            'concretas',
            'total_servicios',
            'total_cost'
        ));
    }


    public function lowStock()
    {
        $products = Product::all();

        $c = 0;
        foreach ($products as $product) {
            if ($product->stock >= $product->stock_minimum) {
                $products->forget($c);
            }
            $c++;
        }

        return view('stadistics.stock', compact('products'));
    }

    public function budget()
    {
        $products = DB::table('products')->orderBy('category_id')->get();
        $products = Product::all();

        // $products = Product::all();

//        $c=0;
//        foreach ($products as $product) {
//            if ($product->stock >= $product->stock_minimum) {
//                $products->forget($c);
//            }
//            $c++;
//        }

        return view('stadistics.demand', compact('products'));
    }

    /**
     * @return  $days_total_cost
     */
    private function calculatePieCharData()
    {
        $dt = Carbon::now()->subDay(1);
        $today = $dt->toDateTimeString();

        $orders = Order::where('status', '<>', 'budget')
            ->where('created_at', '>', $today)
            ->get();

        $day_total_cost = 0;
        $days_total_cost = [];

        foreach ($orders as $order) {
            $day_total_cost = $day_total_cost + $order->total_cost;
        }

        $days_total_cost = array_prepend($days_total_cost, $day_total_cost);

        for ($i = 1; $i < 8; $i++) {

            $day_total_cost = 0;

            $from = Carbon::now()->subDay($i)->toDateTimeString();
            $to = Carbon::now()->subDay($i - 1)->toDateTimeString();

            $orders = Order::where('status', '<>', 'budget')
                ->whereBetween('created_at', [$from, $to])
                ->get();

            foreach ($orders as $order) {
                $day_total_cost = $day_total_cost + $order->total_cost;
            }
            $days_total_cost = array_prepend($days_total_cost, $day_total_cost);
        }

        return $days_total_cost;
    }

    /**
     * @return  $days_total
     */
    private function calculateTotalPieCharData()
    {
        $dt = Carbon::now()->subDay(1);
        $today = $dt->toDateTimeString();

        $orders = Order::where('status', '<>', 'budget')
            ->where('created_at', '>', $today)
            ->get();

        $day_total = 0;
        $days_total = [];

        foreach ($orders as $order) {
            $day_total = $day_total + $order->total;
        }

        $days_total = array_prepend($days_total, $day_total);


        for ($i = 1; $i < 8; $i++) {

            $day_total = 0;

            $from = Carbon::now()->subDay($i)->toDateTimeString();
            $to = Carbon::now()->subDay($i - 1)->toDateTimeString();

            $orders = Order::where('status', '<>', 'budget')
                ->whereBetween('created_at', [$from, $to])
                ->get();

            foreach ($orders as $order) {
                $day_total = $day_total + $order->total;
            }
            $days_total = array_prepend($days_total, $day_total);
        }

        return $days_total;
    }
}
