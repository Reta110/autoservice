<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use App\Product;
use App\Service;
use App\User;
use App\Vehicle;
use Carbon\Carbon;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectClient()
    {
        $clients = User::where('role', 'client')->get();

        return view('orders.select_client', compact('clients'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user, $vehicle)
    {
        $client = User::where('role', 'client')->find($user);
        $vehicle = Vehicle::find($vehicle);

        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        //$products = Product::orderBy('name', 'ASC')->get();
        $services = Service::orderBy('name', 'ASC')->get();
        //dd($services->toArray());

        $serv = $services->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        return view('orders.create', compact('client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config'));
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
            'pay_observations' => $request->get('pay_observations')
        ]);


        for ($i = 0; $i < count($request->product_id); $i++) {
            $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i]]);
        }

        for ($i = 0; $i < count($request->service_id); $i++) {
            $order->services()->attach($request->service_id[$i], ['hh' => $request->service_hh[$i]]);
        }

        //$order->products()->attach(1, ['quantity' => $request->get('product_quantity'), 'price' => $request->get('product_price')]);

        $order->save();

        $orders = Order::with('vehicle')->get();

        return view('orders.index', compact('orders'))->with('success', 'Se ha registrado de manera exitosa!');

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

//    public function pdf($id)
//    {
//        $order = Order::find($id);
//        $config = Configuration::first();
//
//        return view('orders.pdf.pdf', compact('order', 'show','config'));
//    }

    public function edit($id)
    {
        $order = Order::find($id);

        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $services = Service::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $servi = Service::orderBy('name', 'ASC')->get();

        $serv = $servi->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        return view('orders.edit', compact('order', 'client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config'));
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
            $order->products()->detach();
        }

        if ($order->services()->count() > 0) {
            $order->services()->detach();
        }

        $order->services()->detach();
        //FIN Limpiar servicios y productos relacionandos a la orden

        for ($i = 0; $i < count($request->product_id); $i++) {
            $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i]]);
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

        return redirect()->route('orders.index')->with('success', 'Se ha actualizado de manera exitosa!');

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

    public function printWorkPaper(Request $request)
    {
        $id = $request->get('id');
        $order = Order::find($id);
        $config = Configuration::first();

        return view('orders.work_paper', compact('order', 'config'));

    }

    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }
}
