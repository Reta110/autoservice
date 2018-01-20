<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class StandardsController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            $vehicle->km = str_replace('.', '', $vehicle->km);
            $vehicle->update();
        }
    }
}
