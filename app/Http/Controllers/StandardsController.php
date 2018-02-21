<?php

namespace App\Http\Controllers;

use App\Order;
use App\Vehicle;
use Illuminate\Http\Request;

class StandardsController extends Controller
{
    public function index()
    {
        dd('stop');

        $vehicles = Vehicle::all();

        foreach ($vehicles as $vehicle) {
            $vehicle->km = str_replace('.', '', $vehicle->km);
            $vehicle->update();
        }

        dd('Done');
    }

////QUITAR COMILLAS REPETIDAS, YA NO SE AGREGAN MAS POR QUE ESTO SE CONTROLA EN EL SAVE
//    public function express()
//    {
//
//        dd('stop');
//        $orders = Order::where('express_products', '!=', '')->get();
//
//
//        foreach ($orders as $order) {
//
//            $express = preg_replace('/\,+/i', ',', $order->express_products);
//            $express = substr($express, 0, -1);
//
//            $order->express_products = $express;
//            $order->update();
//        }
//
//        dd('Done');
//    }

    //AGREGAR UNA COMA CADA CUATRO COMAS, PORQUE SE AGREGO EL NUEVO CAMPO COSTO
    public function expressComma()
    {
        dd('stop');

        //1326

        $orders = Order::where('express_products','!=','')->get();

        foreach( $orders as $order){
            $test = $order->express_products;
            $count = substr_count($test, ',');
            $count = $count;

            echo 'totales:' . $count.' <br> ';

            $pos=0;
            $c=0;
            $times=0;
            for ($i = 0; $i < $count ;$i++){
                $pos = strpos($test, ',', $pos);
                echo  'pos: '. $pos.' <br> ';

                $pos = $pos +1;

                if($c == 3){
                    echo  'insertar en: '. $pos.' <br>';
                    $test = substr($test,0,$pos).",,".substr($test,$pos);
                    $c = -1;
                }

                $c++;
            }

            $order->express_products = $test;
            $order->update();
        }

        dd('DONE 6');
    }
}
