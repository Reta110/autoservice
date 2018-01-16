<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MaintenancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = Carbon::now()->format('Y');
        $vehicles = Vehicle::with('user')->select('id', 'km', 'model', 'brand', 'year', DB::raw('(km * 1000) / (' . $year . ' - year) as drived'))
            ->orderBy('drived', 'DESC')->get(100);

        foreach ($vehicles as $vehicle) {

            $vehicle->last = $vehicle->orders->sortByDesc('ended_date');
            if (count($vehicle->last) > 0) {
                $vehicle->last = $vehicle->last[0]->ended_date;
            }
        }


        return view('maintenance.index', compact('vehicles'));
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
        return view('maintenance.show', compact('vehicle'));
    }
}
