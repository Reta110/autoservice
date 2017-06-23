<?php

namespace App\Http\Controllers;

use App\Configuration;
use Illuminate\Http\Request;

class ConfigurationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuration = Configuration::first();

        return view('configurations.edit', compact('configuration'));
    }



    public function update(Request $request, $id)
    {
        $configuration = Configuration::find($id);
        $configuration->update($request->all());

        return redirect()->route('configurations.index')->with('success', 'Se ha actualizado de manera exitosa!');
    }

}
