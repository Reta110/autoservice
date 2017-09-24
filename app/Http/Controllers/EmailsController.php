<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class EmailsController extends Controller
{
    public function sendOrderByEmail($id, $email = null)
    {

        $order = Order::find($id);
        $config = Configuration::first();
        $name = str_replace_last(' ', '-', $order->user->name);
        $path = public_path() . '/pdf/Order-'.$name.'-'. $id .'.pdf';

        if (file_exists($path)){
            unlink($path);
        }

        $view = view('orders.pdf_view', compact('order', 'config'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->save($path);

         // $mail = $order->user->mail;
        // $automec = webautomec@gmail.com;

        while (file_exists($path) == false) {
            sleep(2);
        }

        if($email == null){
            Mail::to('webautomec@gmail.com')->send(new OrderShipped($order));
            return redirect()->to(route('orders.show', $order))->with('success', 'Se ha enviado de manera exitosa!');
        }else{
            Mail::to($email)->send(new OrderShipped($order));
            return redirect()->to(route('orders.show', $order))->with('success', 'Se ha enviado al cliente de manera exitosa!');
        }
    }
}
