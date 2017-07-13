<?php

namespace App\Http\Controllers;

use App\User;
use App\Vehicle;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Se ha registrado de manera exitosa!');
    }

    public function vehicleStore(Request $request, $order = null, $user = null)
    {
//        dd('order'.$order.'user'.$user);
        $vehicle = Vehicle::create($request->all());

        if ($order == null && $user == null) {
            return redirect()->route('add-order', [$request->get('user_id'), $vehicle])->with('success', 'Se ha registrado de manera exitosa!');
        } else {
            return redirect()->route('duplicate-order', [$order, $user, $vehicle->id])->with('success', 'Se ha duplicado la orden y ha sido agregado el vehiculo exitosamente!. ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')->with('success', 'Se ha actualizado de manera exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        Vehicle::destroy($id);

        return redirect()->route('vehicles.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }
}
