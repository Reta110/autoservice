<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use App\Product;
use App\ProductCategory;
use App\Service;
use App\User;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\DeclareDeclare;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    public function selectClient()
    {
        $clients = User::where('role', 'client')->get();

        return view('orders.select_client', compact('clients'));
    }

    public function duplicateSelectClient($order)
    {
        $order_id = $order;

        $clients = User::where('role', 'client')->get();

        return view('orders.select_client', compact('clients', 'order_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectVehicle($user)
    {
        $client = User::where('role', 'client')->find($user);

        return view('orders.select_vehicle', compact('client'));
    }

    public function duplicateSelectVehicle($order, $user)
    {
        $order_id = $order;
        $user_id = $user;

        $client = User::where('role', 'client')->find($user);

        return view('orders.select_vehicle', compact('client', 'user_id', 'order_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $vehicle)
    {
        $client = User::where('role', 'client')->find($user);
        $vehicle = Vehicle::find($vehicle);

        $products = Product::orderBy('name', 'ASC')->get();
        //$products = array_unique($products);
        $services = Service::orderBy('name', 'ASC')->get();
        //dd($services->toArray());

        $recommended = Product::orderBy('name', 'ASC')->where('tags', 'like', '%' . $vehicle->brand . '%')->orWhere('tags', 'like', '%' . $vehicle->model . '%')->get();
        $serv = $services->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();
//        $marcas = Product::orderBy('name', 'ASC')->pluck('brand')->all();
//        $modelos = Product::orderBy('name', 'ASC')->pluck('model')->all();
        $marcas = [];
        $modelos = [];
        $categories = ProductCategory::orderBy('name', 'ASC')->pluck('name', 'id')->all();


        return view('orders.create', compact('client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config', 'marcas', 'modelos', 'categories', 'recommended'));
    }

    public function duplicateOrder($order, $user, $vehicle)
    {
        $order = Order::find($order);

        $order_copy = Order::create([
            'title' => $order->title,
            'user_id' => $user,
            'vehicle_id' => $vehicle,
            'status' => 'budget',
            'start_date' => Carbon::now(),
            'total_cost' => $order->total_cost,
            'neto' => $order->neto,
            'iva' => $order->iva,
            'total' => $order->total,
            'observations' => $order->observations,
            'hh' => $order->hh,
            'discount' => $order->discount,
            'paid' => 'no',
            'type_pay' => '',
            'pay_observations' => '',
        ]);

        if (count($order->products) > 0) {
            foreach ($order->products as $product) {
                $order_copy->products()->attach($product->id, ['quantity' => $product->pivot->quantity, 'price' => $product->pivot->price]);
            }
        }

        if (count($order->services) > 0) {
            foreach ($order->services as $service) {
                $order_copy->services()->attach($service->id, ['hh' => $service->pivot->hh]);
            }
        }

        $order_copy->save();

        return redirect()->route('orders.edit', $order_copy->id)->with('success', 'Se ha duplicado de manera exitosa!. Ya puede editarlo.');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required'
        ]);

        $order = Order::create([
            'title' => $request->get('title'),
            'user_id' => $request->get('user_id'),
            'vehicle_id' => $request->get('vehicle_id'),
            'status' => $request->get('status'),
            'start_date' => Carbon::now(),
            'total_cost' => $request->get('total_cost'),
            'neto' => $request->get('neto'),
            'iva' => $request->get('iva'),
            'total' => $request->get('total'),
            'observations' => $request->get('observations'),
            'hh' => $request->get('hh'),
            'discount' => $request->get('discount'),
            'paid' => $request->get('paid'),
            'type_pay' => $request->get('type_pay'),
            'pay_observations' => $request->get('pay_observations'),
            'km' => $request->get('km'),
        ]);

        if (count($request->product_id) > 0) {
            for ($i = 0; $i < count($request->product_id); $i++) {
                $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i]]);
            }
        }

        if (count($request->service_id) > 0) {
            for ($i = 0; $i < count($request->service_id); $i++) {
                $order->services()->attach($request->service_id[$i], ['hh' => $request->service_hh[$i]]);
            }
        }

        //$order->products()->attach(1, ['quantity' => $request->get('product_quantity'), 'price' => $request->get('product_price')]);

        $order->save();

//        $orders = Order::with('vehicle')->get();
//
//        return view('orders.index', compact('orders'))->with('success', 'Se ha registrado de manera exitosa!');

        return redirect()->route('orders.show', $order->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $config = Configuration::first();

        return view('orders.show', compact('order', 'config'));
    }

    public function edit($id)
    {
        $order = Order::find($id);

        $client = $order->user;
        $vehicle = $order->vehicle;

        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $services = Service::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $servi = Service::orderBy('name', 'ASC')->get();

        $recommended = Product::orderBy('name', 'ASC')->where('tags', 'like', '%' . $order->vehicle->brand . '%')->orWhere('tags', 'like', '%' . $order->vehicle->model . '%')->get();

        $serv = $servi->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        $categories = ProductCategory::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        $marcas = [];
        $modelos = [];

        return view('orders.edit', compact('order', 'client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config', 'marcas', 'modelos', 'categories', 'recommended'));
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
        $this->validate($request, [
            'title' => 'required',
            'status' => 'required'
        ]);

        //Limpiar servicios y productos relacionandos a la orden
        $order = Order::find($id);
        if ($order->products()->count() > 0) {

//            //Agregar todos de nuevo al stock
//
//            if ($request->get('status') != 'budget') {
//                //todo hacer agergar todos
//                foreach ($order->products as $product) {
//                    dd($product->pivot->quantity);
//                    $this->addToStock($product->id, $product->pivot->quantity);
//
//                }
//            }
            //borrar todos
            $order->products()->detach();
        }

        if ($order->services()->count() > 0) {
            $order->services()->detach();
        }

        $order->services()->detach();
        //FIN Limpiar servicios y productos relacionandos a la orden

        for ($i = 0; $i < count($request->product_id); $i++) {
            $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i]]);


            //Descontar todos de nuevo del stock
            if ($request->get('status') != 'budget') {
                //todo hacer descontar todos
            }
        }

        for ($i = 0; $i < count($request->service_id); $i++) {
            $order->services()->attach($request->service_id[$i], ['hh' => $request->service_hh[$i]]);
        }

        $order->hh = $request->get('hh');
        $order->title = $request->get('title');
        $order->status = $request->get('status');
        $order->start_date = Carbon::now();
        $order->total_cost = $request->get('total_cost');
        $order->neto = $request->get('neto');
        $order->iva = $request->get('iva');
        $order->total = $request->get('total');
        $order->observations = $request->get('observations');
        $order->discount = $request->get('discount');
        $order->paid = $request->get('paid');
        $order->type_pay = $request->get('type_pay');
        $order->pay_observations = $request->get('pay_observations');

        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Se ha actualizado de manera exitosa!');
    }

    public function addAjax(Request $request)
    {
        $id = request()->get('idproduct');
        $quantity = request()->get('quantity');

        if ($request->ajax()) {

            $product = Product::find($id);

            $product->stock = $product->stock + $quantity;

            $product->save();

            return response()->json(['options' => '']);
        }

    }

    public function addToStock($producto_id, $quantity)
    {
        $product = Product::find($producto_id);

        $product->stock = $product->stock + $quantity;

        $product->save();

    }


    public function removeAjax(Request $request)
    {
        $id = request()->get('idproduct');
        $quantity = request()->get('quantity');

        if ($request->ajax()) {

            $product = Product::find($id);

            $product->stock = $product->stock - $quantity;

            $product->save();

            return response()->json(['options' => '']);
        }

    }

    public function removeFromStock($producto_id, $quantity)
    {
        $product = Product::find($producto_id);

        $product->stock = $product->stock - $quantity;

        $product->save();

    }

    public
    function printWorkPaper(Request $request)
    {
        $id = $request->get('id');
        $order = Order::find($id);
        $config = Configuration::first();

        return view('orders.work_paper', compact('order', 'config'));

    }

    public
    function selectBrandsAjax(Request $request)
    {
        //id categroy
        $id = request()->get('id');

        if ($request->ajax()) {
            $optionss = Product::orderBy('brand', 'ASC')->where('category_id', $id)->pluck('brand', 'id')->all();
            $optionss = array_unique($optionss);
            $data = view('orders.partials.select-ajax', compact('optionss'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public
    function selectModelsAjax(Request $request)
    {
        //id category
        $id = request()->get('id');
        $brand = request()->get('brand');

        if ($request->ajax()) {
            $optionss = Product::orderBy('model', 'ASC')->where('category_id', $id)->where('brand', 'like', $brand)->pluck('model', 'model')->all();
            $data = view('orders.partials.select-ajax', compact('optionss'))->render();
            return response()->json(['options' => $data]);
        }
    }

    public
    function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }
}
