<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = str_replace_last(' ', '-', $this->order->user->name);
        $path = public_path() . '/pdf/Order-'.$name.'-'. $this->order->id .'.pdf';

        return $this->from('contacto@automec.cl')
            ->subject('Automec Servicio Automotriz - Resumen de '. $this->order->user->fullname)
            ->view('emails.orders')->with([
                'order' => $this->order,
            ])->attach($path);
    }
}
