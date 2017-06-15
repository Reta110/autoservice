<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Service;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;

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

        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id')->all();
        $services = Service::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('orders.create', compact('client', 'vehicle', 'products', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $order = Order::create([
            'title' => 'Mantenimiento 30mil km',
            'user_id' => $request->get('user_id'),
            'vehicle_id' => $request->get('vehicle_id'),
            'total_cost' => '1500',
            'iva' => '100',
            'total' => '3500'
        ]);

        for ($i = 0; $i < count($request->product_id); $i++) {
            $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i]]);
        }

        for ($i = 0; $i < count($request->service_id); $i++) {
            $order->services()->attach($request->service_id[$i], ['hh' => $request->service_hh[$i]]);
        }

        //$order->products()->attach(1, ['quantity' => $request->get('product_quantity'), 'price' => $request->get('product_price')]);

        $order->save();

        $orders = Order::all();

        return view('orders.index', compact('orders'))->with('success', 'Se ha registrado de manera exitosa!');;

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
        Order::destroy($id);

        return redirect()->route('orders.index')->with('success', 'Se ha eleminado de manera exitosa!');;
    }
}