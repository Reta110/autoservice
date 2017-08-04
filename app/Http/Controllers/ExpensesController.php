<?php

namespace App\Http\Controllers;

use App\Configuration;
use App\Expense;
use App\FixedExpense;
use App\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpensesController extends Controller
{

    public function resume()
    {
        $starM = Carbon::now()->startOfMonth()->toDateString();
        $endM = Carbon::now()->endOfMonth()->toDateString();

        list($expenses, $fixedExpenses, $debit_comision, $credit_comision) = $this->findExpensesAndCalculate($starM, $endM);

        return view('expenses.resume', compact('expenses', 'fixedExpenses', 'debit_comision', 'credit_comision'));
    }

    public function expensesSearch(Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');

        $c = Carbon::now();
        $c->month = $month;
        $c->year = $year;

        $starM = $c->startOfMonth()->toDateString();
        $endM = $c->endOfMonth()->toDateString();

        list($expenses, $fixedExpenses, $debit_comision, $credit_comision) = $this->findExpensesAndCalculate($starM, $endM);

        return view('expenses.resume', compact('expenses', 'fixedExpenses', 'debit_comision', 'credit_comision','month','year'));
    }

    private function total($items)
    {
        $total = 0;
        if (count($items) > 0) {
            foreach ($items as $item) {
                $total = $total + $item->total;
            }
        }
        return $total;
    }

    private function debitComision($items)
    {
        $conf = Configuration::first();
        $total = 0;
        if (count($items) > 0) {
            foreach ($items as $item) {
                $total = $total + ($item->total * $conf->comision_tdd);
            }
        }
        return $total;
    }

    private function creditComision($items)
    {
        $conf = Configuration::first();
        $total = 0;
        if (count($items) > 0) {
            foreach ($items as $item) {
                $total = $total + ($item->total * $conf->comision_tdc);
            }
        }
        return $total;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        Expense::create($request->all());

        if ($request->ajax()) {
            $aux = Expense::orderBy('id', 'ASC')->get();
            $prod = $aux->toJson();
            return response()->json(['success' => 'Se ha registrado de manera exitosa!', 'prod' => $prod]);
        } else {
            return redirect()->route('expenses.index')->with('success', 'Se ha registrado de manera exitosa!');
        }
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
        $expense = Expense::find($id);
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        $expense = Expense::find($id);

        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Se ha actualizado de manera exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        Expense::destroy($id);

        return redirect()->route('expenses.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }

    /**
     * @param $starM
     * @param $endM
     * @return array
     */
    private function findExpensesAndCalculate($starM, $endM)
    {
        $expenses = Expense::whereBetween('date', [$starM, $endM])->get();
        $expenses = $this->total($expenses);

        $fixedExpenses = FixedExpense::whereBetween('date', [$starM, $endM])->get();
        $fixedExpenses = $this->total($fixedExpenses);

        $debit_comision = Order::whereBetween('ended_date', [$starM, $endM])
            ->where('type_pay', 'TransBank')->where('status', 'ended')->where('paid', 'si')->get();
        $debit_comision = $this->debitComision($debit_comision);

        $credit_comision = Order::whereBetween('ended_date', [$starM, $endM])
            ->where('type_pay', 'TransBank')->where('status', 'ended')->where('paid', 'si')->get();
        $credit_comision = $this->creditComision($credit_comision);

        return array($expenses, $fixedExpenses, $debit_comision, $credit_comision);
    }
}
