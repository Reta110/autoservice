<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Client;

class ClientsController extends Controller
{


    public function index()
    {
        $clients = User::where('role', 'client')->get();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request, $order = null)
    {
        $user = User::create($request->all());

        if ($order == null) {
            return redirect()->route('select-vehicle', $user)->with('success', 'Se ha registrado de manera exitosa!');

        } else {
            return redirect()->route('duplicate-select-vehicle', [$order, $user->id])->with('success', 'Se ha registrado de manera exitosa!');
        }
    }

    public function save(Request $request)
    {

        User::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Se ha registrado de manera exitosa!');

    }

    public function edit($id)
    {
        $client = User::find($id);
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $client = User::find($id);
        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Se ha actualizado de manera exitosa!');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect()->route('clients.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }
}