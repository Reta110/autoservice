<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ClientsController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'last_name' => 'required',
            'rut' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $user = User::create($request->all());

        return redirect()->route('select-vehicle',$user)->with('success', 'Se ha registrado de manera exitosa!');

    }
}