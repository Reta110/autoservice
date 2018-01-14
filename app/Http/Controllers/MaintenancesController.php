<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenancesController extends Controller
{
    public function index()
    {
        return view('maintenance.index');
    }
}
