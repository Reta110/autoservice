<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class EmailsController extends Controller
{
    public function sendOrderByEmail($id)
    {

//        $plate		= "FGKZ61"; //Patente
//        $key		= env('MULTIDATA_APP_ID'); //Se otorga en el portal de desarrolladores
//        $api		= "cars"; //persons, cars, services
//        $method		= "jsongetplateinfo"; //Ver catalogo de APIs
//        $headr		= array();
//        $headr[]	= 'Content-length: 0';
//        $headr[]	= 'Content-type: application/json';
//        $headr[]	= 'Authorization: '.$key;
//        $url		= "http://api.multidatachile.com/".$api."/".$method."/".$plate;
//        $crl		= curl_init();
//        curl_setopt($crl, CURLOPT_HTTPHEADER, $headr);
//        curl_setopt($crl, CURLOPT_URL, $url);
//        curl_setopt($crl, CURLOPT_POST, false);
//        $rest		= curl_exec($crl);
//        curl_close($crl);
//        print_r($rest);

        $order = Order::find($id);
        $config = Configuration::first();

        $view = view('orders.pdf_view', compact('order', 'config'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->save(public_path() . '/pdf/Order-' . $id . '.pdf');

        $mail = $order->user->mail;
        $automec = env('MAIL_FROM_ADDRESS');

        while (file_exists(public_path() . '/pdf/Order-' . $id . '.pdf') == false) {
            Mail::to($automec)->queue(new OrderShipped($order));
        }

        return redirect()->to(route('orders.show', $order))->with('success', 'Se ha enviado de manera exitosa!');
    }
}
