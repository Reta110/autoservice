<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Mail\SendProductStockMinimum;
use App\Order;
use App\Product;
use App\ProductCategory;
use App\Service;
use App\User;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    /**
     * Display a listing.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        session(['back' => 'orders.index']);
        $orders = Order::with(['user', 'vehicle'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display a resumen.
     *
     * @return \Illuminate\Http\Response
     */
    public function resume()
    {
        session(['back' => 'orders.resume']);

        $orders = Order::where('status', 'started')->with(['user', 'vehicle'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display lasts.
     *
     * @return \Illuminate\Http\Response
     */
    public function lasts()
    {
        session(['back' => 'orders.lasts']);

        $orders = Order::OrderBy('id', 'DESC')->with(['user', 'vehicle'])->limit(50)->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Display the plantillas.
     *
     * @return \Illuminate\Http\Response
     */
    public function plantillas()
    {
        session(['back' => 'orders.plantillas']);

        $orders = Order::where('status', 'plantilla')->with(['user', 'vehicle'])->get();

        return view('orders.index', compact('orders'));
    }

    /**
     * Select Client to create new order.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectClient()
    {
        $clients = User::where('role', 'client')->get();

        return view('orders.select_client', compact('clients'));
    }

    public function selectClientToChange($order)
    {
        $clients = User::where('role', 'client')->get();

        return view('orders.change_client', compact('clients', 'order'));
    }

    public function changeClient($order, $user)
    {
        $order = Order::find($order);
        $order->user_id = $user;
        $order->save();

        return redirect()->to(route('orders.edit', $order));
    }

    public function duplicateSelectClient($order)
    {
        $order_id = $order;

        $clients = User::where('role', 'client')->get();

        return view('orders.select_client', compact('clients', 'order_id'));
    }

    /**
     * Select vehicle´s client.
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
        $services = Service::orderBy('name', 'ASC')->get();

        $recommended = Product::orderBy('name', 'ASC')->Where('tags', 'like', '%' . $vehicle->model . '%')->get();
        $serv = $services->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        $marcas = [];
        $modelos = [];
        $categories = ProductCategory::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('orders.create', compact('client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config', 'marcas', 'modelos', 'categories', 'recommended'));
    }

    public function express()
    {
        //hack to select client and vehicle express
        $client = User::where('role', 'client')->find(557);
        $vehicle = Vehicle::find(633);
        $express = true;

        $products = Product::orderBy('name', 'ASC')->get();
        $services = Service::orderBy('name', 'ASC')->get();

        $recommended = Product::orderBy('name', 'ASC')->Where('tags', 'like', '%' . $vehicle->model . '%')->get();
        $serv = $services->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        $marcas = [];
        $modelos = [];
        $categories = ProductCategory::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        return view('orders.create', compact('client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config', 'marcas', 'modelos', 'categories', 'recommended', 'express'));
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
            'ot_observations' => $order->ot_observations,
            'hh' => $order->hh,
            'discount' => $order->discount,
            'paid' => 'no',
            'pay_observations' => '',
            'pay_fees_quantity' => '0',
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

        return redirect()->route('orders.edit', $order_copy->id)->with('success', 'Se ha duplicado de manera exitosa!. Ya puede comenzar a editarlo.');;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session(['back' => 'orders.index']);

//        $express = preg_replace('/\,+/i', ',', $request->get('total_express'));
//        $express = substr($express, 0, -1);

        $order = Order::create([
            'title' => $request->get('title'),
            'user_id' => $request->get('user_id'),
            'vehicle_id' => $request->get('vehicle_id'),
            'status' => $request->get('status'),
            'start_date' => Carbon::now(),
            'total_cost' => $request->get('total_cost'),
            'extra_cost' => $request->get('extra_cost'),
            'neto' => $request->get('neto'),
            'iva' => $request->get('iva'),
            'total' => $request->get('total'),
            'observations' => $request->get('observations'),
            'hh' => $request->get('hh'),
            'discount' => $request->get('discount'),
            'paid' => 'no',
            'type_pay' => $request->get('type_pay'),
            'card_type' => $request->get('card_type'),
            'pay_observations' => $request->get('pay_observations'),
            'pay_fees_quantity' => $request->get('pay_fees_quantity'),
            'km' => $request->get('km'),
            'express_products' => $request->get('express_products'),
            'total_express' => $request->get('total_express'),

        ]);

        if (count($request->product_id) > 0) {
            for ($i = 0; $i < count($request->product_id); $i++) {
                $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i], 'unit_cost' => $request->product_cost[$i]]);
            }
        }

        if (count($request->service_id) > 0) {
            for ($i = 0; $i < count($request->service_id); $i++) {
                $order->services()->attach($request->service_id[$i], ['hh' => $request->service_hh[$i]]);
            }
        }

        //Descontar productos del stock si estado es ended
        if ($order->status == 'ended') {
            foreach ($order->products as $product) {
                $this->removeFromStock($product->id, $product->pivot->quantity);
            }
        }
        //Fin descontar productos del stock si estado es ended

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

        $total_products = $this->countTotalProducts($order);
        $total_services = $this->countTotalServices($order);

        $cells = $this->getExpressProductsCellsShow($order);

        return view('orders.show', compact('order', 'config', 'total_services', 'total_products', 'cells'));
    }

    public function countTotalProducts($order)
    {
        $total = 0;
        foreach ($order->products as $product) {
            $total = $total + $product->pivot->price * $product->pivot->quantity;
        }

        return $total;
    }

    public function countTotalServices($order)
    {
        $total = 0;
        foreach ($order->services as $item) {
            $total = $total + $item->pivot->hh * $order->hh;
        }

        return $total;
    }

    public function edit($id)
    {
        session(['back' => 'orders.index']);

        $order = Order::find($id);

        $client = $order->user;
        $vehicle = $order->vehicle;

        $products = Product::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $services = Service::orderBy('name', 'ASC')->pluck('name', 'id', 'price')->all();
        $servi = Service::orderBy('name', 'ASC')->get();

        $recommended = Product::orderBy('name', 'ASC')->Where('tags', 'like', ' % ' . $order->vehicle->model . ' % ')->get();

        $serv = $servi->toJson();
        $aux = Product::orderBy('name', 'ASC')->get();
        $prod = $aux->toJson();

        $config = Configuration::first();

        $categories = ProductCategory::orderBy('name', 'ASC')->pluck('name', 'id')->all();

        $marcas = Product::orderBy('brand', 'ASC')->pluck('brand', 'id')->all();
        $modelos = Product::orderBy('model', 'ASC')->pluck('model', 'id')->all();

        $cells = $this->getExpressProductsCells($order);

        return view('orders.edit', compact('order', 'client', 'vehicle', 'products', 'services', 'serv', 'prod', 'config', 'marcas', 'modelos', 'categories', 'recommended', 'cells'));
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
            $order->products()->attach($request->product_id[$i], ['quantity' => $request->product_quantity[$i], 'price' => $request->product_price[$i], 'unit_cost' => $request->product_cost[$i]]);
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
        $order->extra_cost = $request->get('extra_cost');
        $order->observations = $request->get('observations');
        $order->ot_observations = $request->get('ot_observations');
        $order->discount = $request->get('discount');
        $order->paid = $request->get('paid');
        $order->type_pay = $request->get('type_pay');
        $order->card_type = $request->get('card_type');
        $order->pay_observations = $request->get('pay_observations');
        $order->pay_fees_quantity = $request->get('pay_fees_quantity');
        if ($order->type_pay == 'Cheque' && $order->pay_fees_quantity == 0) {
            $order->pay_fees_quantity = 1;
        }
        $order->km = $request->get('km');

//        $express = preg_replace('/\,+/i', ',', $order->express_products);
//        $express = substr($express, 0, -1);
//        $order->express_products = $express;

        $order->express_products = $request->get('express_products');
        $order->total_express = $request->get('total_express');

        //Descontar productos del stock si estado es ended
        if ($order->status == 'ended' && $order->delete_stock == 0) {
            foreach ($order->products as $product) {
                $this->removeFromStock($product->id, $product->pivot->quantity);
            }
            $order->delete_stock = 1;
            $order->ended_date = Carbon::now();
        }
        //Fin descontar productos del stock si estado es ended

        $order->save();

        return redirect()->route('orders.show', $order->id)->with('success', 'Se ha actualizado de manera exitosa!');
    }

    public function openOrder($id)
    {
        $order = Order::find($id);
        $order->status = 'started';
        $order->save();

        return redirect()->route('orders.edit', $order->id)->with('success', 'Se abrió la orden. Recuerde descontar o aumentar manualmente los productos que modifique en la orden!.');
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

        if ($product->stock <= $product->stock_minimum) {
            $this->sendProductNotification($product);
        }

        $product->save();
    }

    public function sendProductNotification($product)
    {
        Mail::to('webautomec@gmail.com')->send(new SendProductStockMinimum($product));
    }

    public function printWorkPaper(Request $request)
    {
        $id = $request->get('id');
        $order = Order::find($id);
        $config = Configuration::first();

        $cells = $this->getExpressProductsCellsWorkPaper($order);

        return view('orders.work_paper', compact('order', 'config', 'cells'));
    }

    public function selectBrandsAjax(Request $request)
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

    public function selectModelsAjax(Request $request)
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

    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('orders.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }

    /**
     * @param $order
     * @return array|string
     */
    public function getExpressProductsCells($order)
    {
        $cells = explode(",", $order->express_products);

        $f = 0;
        $c = 0;
        foreach ($cells as $cell) {
            $aux[$f][$c] = $cell;
            if ($c > 0 && $c % 4 == 0) {
                $f++;
                $c = -1;
            }
            $c++;
        }
        return json_encode($aux);

    }

    /**
     * @param $order
     * @return array|string
     */
    public function getExpressProductsCellsShow($order)
    {
        $cells = explode(",", $order->express_products);

        foreach ($cells as $key => $cell) {

            $c = $key + 1;

            if ($cell == '' || ($c % 5 == 0)){
                array_forget($cells, $key);
            }
        }

        $f = 0;
        $c = 1;
        $aux = [];
        foreach ($cells as $cell) {
            $aux[$f][$c] = $cell;
            if ($c % 4 == 0) {
                $f++;
                $c = 0;
            }
            $c++;
        }

        return json_encode($aux);

    }


    private function getExpressProductsCellsWorkPaper($order)
    {
        $cells = explode(",", $order->express_products);

        //quitar las innecesarias
        $e = 0;
        foreach ($cells as $cell) {

            $i = 1 + $e;
            unset($cells[$i]);
            $j = 3 + $e;
            unset($cells[$j]);
            $k = 4 + $e;
            unset($cells[$k]);

            $e = $i + 4;
        }

        $f = 0;
        $c = 0;

        foreach ($cells as $cell) {
            if($cell != ''){
            $aux[$f][$c] = $cell;
            if ($c > 0 && $c % 1 == 0) {
                $f++;
                $c = -1;
            }
            $c++;
            }
        }
        return json_encode($aux);

    }
}
