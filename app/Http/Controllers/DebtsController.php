<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;


class DebtsController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'ended')->where('paid', 'no')->where('type_pay','!=' ,'Cheque')->get();
        $total_orders = $this->totalOrder($orders);

        /* Mostras las ordenes pagadas con transkbank utilizando cuotas
        y donde las cuotas sean nuevas. */

        $transbanks = Order::endedPaid()->where('type_pay', 'TransBank')->get();

        $this->forgetOldFees($transbanks);
        $total_transbanks = $this->totals($transbanks);

        $checks = Order::where('status', 'ended')->where('paid', 'no')->where('type_pay','Cheque')->get();

        //$this->forgetOldFees($checks);
        $total_checks = $this->totals($checks);


        return view('debts.index', compact('orders', 'transbanks', 'checks', 'total_orders', 'total_transbanks', 'total_checks'));
    }

    /**
     * @param $transbanks
     */
    private function forgetOldFees($orders)
    {
        $c = 0;
        //A cada una se le revisa la ultima fecha de las cuotas
        foreach ($orders as $order) {

            $order->last_due = \Carbon\Carbon::parse($order->ended_date)
                ->addMonth($order->pay_fees_quantity);

            //Si la ultima cuota es menos que el día de hoy la sacamos
            //para no mostrarla

            if ($order->last_due < \Carbon\Carbon::now()) {
                $orders->forget($c);
            }

            $c++;
        }
    }

    private function totals($orders)
    {
        $total = 0;

        foreach ($orders as $order) {

            for ($i = 0; $i <= $order->pay_fees_quantity; $i++) {

                $month = \Carbon\Carbon::parse($order->ended_date)
                    ->addMonth($i);

                if ($month > \Carbon\Carbon::now()) {
                    $total = $total + ($order->total / $order->pay_fees_quantity);
                }
            }

        }

        return $total;
    }

    private function totalOrder($orders)
    {
        $total = 0;

        foreach ($orders as $order) {

            $total = $total + $order->total;

        }

        return $total;
    }
}
