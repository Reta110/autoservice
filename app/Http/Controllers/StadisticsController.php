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

        $orders = Order::with('products')->get();

//       foreach ($orders as $order){
//           echo $order->products()->count();
//           echo $order->products()->pivot->quantity->count();
//       }


        return view('stadistics.index', compact('total_cost', 'products_count'));
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
        $dates = explode(' - ', $request->get('date'));

        $ini_date = Carbon::createFromFormat('d/m/Y', $dates[0])->subDay(1);
        $end_date = Carbon::createFromFormat('d/m/Y', $dates[1])->addDay(1);

        $orders = Order::where('status', '<>', 'budget')
            ->whereBetween('created_at', [$ini_date, $end_date])
            ->get();

        $total_cost = 0;
        $total = 0;

        foreach ($orders as $order) {
            $total_cost = $total_cost + $order->total_cost;
            $total = $total + $order->total;
        }


        return view('stadistics.show', compact('total_cost', 'products_count', 'orders','total'));
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
}
