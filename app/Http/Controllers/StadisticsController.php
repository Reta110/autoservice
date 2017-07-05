<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        $orders = Order::where('status', '<>', 'budget')
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
        $concretas = Order::where('status', '<>', 'budget')->count();
        $total_products = Product::all();
        $total_productos = $total_products->sum('stock');

        return view('stadistics.index', compact('total_cost',
            'products_count',
            'orders',
            'total',
            'total_ordenes',
            'concretas',
            'total_servicios',
            'days_total_cost',
            'days_total',
            'total_productos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
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
        $concretas = Order::where('status', '<>', 'budget')->count();


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

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
