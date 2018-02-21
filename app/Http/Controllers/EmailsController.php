<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Http\Controllers\OrdersController;

class EmailsController extends Controller
{
    public function sendOrderByEmail($id, Request $request)
    {
        $email = $request->get('email');
        $text_email_order = $request->get('text_email_order');
        $o = new OrdersController();

        $order = Order::find($id);
        $config = Configuration::first();

        $total_products = $o->countTotalProducts($order);
        $total_services = $o->countTotalServices($order);

        $cells = $this->getExpressProductsCellsShow($order);

        $name = str_replace_last(' ', '-', $order->user->name);
        $path = public_path().'/pdf/Order-'.$name.'-'.date('d-m-Y').'.pdf';

        if (file_exists($path)){
            unlink($path);
        }

        if($email == null){
            $view = view('orders.pdf_view', compact('order', 'config','total_products','total_services','cells'))->render();
        }else{
            $view = view('orders.pdf_view_client', compact('order', 'config','total_products','total_services','cells'))->render();
        }

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $pdf->save($path);


        if($email == null){
            Mail::to('webautomec@gmail.com')->send(new OrderShipped($order));
            return redirect()->to(route('orders.show', $order))->with('success', 'Se ha enviado de manera exitosa!');
        }else{
            Mail::to($email)->send(new OrderShipped($order, $text_email_order));
            return redirect()->to(route('orders.show', $order))->with('success', 'Se ha enviado al cliente de manera exitosa! - ('.$email.')');
        }
    }

    public function getExpressProductsCellsShow($order)
    {
        $cells = explode(",", $order->express_products);

        foreach ($cells as $key => $cell) {
            //|| (($key+1) % 5) == 0
            if ($cell == '' || (($key+1) % 5) == 0){
                array_forget($cells, $key);
            }
        }
        return $cells;

    }
}
