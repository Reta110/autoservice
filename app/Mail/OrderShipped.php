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
    public function __construct($order,$text_email_order = null)
    {
        $this->order = $order;
        $this->text_email_order = $text_email_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = str_replace_last(' ', '-', $this->order->user->name);

        $path = 'admin.automec.cl/pdf/Order-'.$name.'-'.date('d-m-Y').'.pdf';

        return $this->from('contacto@automec.cl')
            ->subject('Automec Servicio Automotriz - Resumen de '. $this->order->user->fullname)
            ->view('emails.orders')->with([
                'order' => $this->order,
                'text_email_order' => $this->text_email_order,
                'path' => $path
            ]);
    }
}
