<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Order;
use App\Product;
use App\Vehicle;
use App\Service;
use App\User;


class ExportController extends Controller
{
    public function export()
    {
        return view('stadistics.export');
    }

    public function exportOrders()
    {
        Excel::create('Ordenes de Automec', function ($excel) {
            $excel->sheet('Ordenes', function ($sheet) {

                $items = Order::join('users','users.id','orders.user_id')->join('vehicles','vehicles.id','orders.vehicle_id')->get();
                $sheet->fromArray($items);
            });
        })->download('xls');
    }

    public function exportProducts()
    {
        Excel::create('Productos de Automec', function ($excel) {
            $excel->sheet('Productos', function ($sheet) {

                $items = Product::all();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }

    public function exportClients()
    {
        Excel::create('Clientes de Automec', function ($excel) {
            $excel->sheet('Clientes', function ($sheet) {

                $items = User::all();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }

    public function exportVehicles()
    {
        Excel::create('Vehículos de Automec', function ($excel) {
            $excel->sheet('Vehículos', function ($sheet) {

                $items = Vehicle::join('users','users.id','orders.user_id')->get();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }

    public function exportServices()
    {
        Excel::create('Servicios de Automec', function ($excel) {
            $excel->sheet('Servicios', function ($sheet) {

                $items = Service::all();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }

    public function exportDebts()
    {
        Excel::create('Duedores de Automec', function ($excel) {
            $excel->sheet('Duedores', function ($sheet) {

                $items = Order::where('status', 'ended')->where('paid', 'no')->join('users','users.id','orders.user_id')->get();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }

    public function exportAll()
    {
        Excel::create('Todo de Automec', function ($excel) {
            $excel->sheet('Ordenes', function ($sheet) {

                $items = Order::all();
                $sheet->fromArray($items);
            });
            $excel->sheet('Productos', function ($sheet) {

                $items = Product::all();
                $sheet->fromArray($items);
            });
            $excel->sheet('Clientes', function ($sheet) {

                $items = User::all();
                $sheet->fromArray($items);
            });
            $excel->sheet('Vehículos', function ($sheet) {

                $items = Vehicle::all();
                $sheet->fromArray($items);
            });
            $excel->sheet('Servicios', function ($sheet) {

                $items = Service::all();
                $sheet->fromArray($items);
            });
            $excel->sheet('Duedores', function ($sheet) {

                $items = Order::where('status', 'ended')->where('paid', 'no')->get();
                $sheet->fromArray($items);
            });

        })->download('xls');
    }
}
