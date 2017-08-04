<?php

namespace App\Http\Controllers;

use App\Expense;
use App\FixedExpense;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FixedExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = FixedExpense::all();
        return view('fixed-expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('fixed-expenses.create');
    }

    public function closeMonth()
    {
        $starM = Carbon::now()->subMonth(1)->startOfMonth()->toDateString();
        $endM = Carbon::now()->subMonth(1)->endOfMonth()->toDateString();

        $fixedExpenses = FixedExpense::whereBetween('date', [$starM, $endM])->get();

        return view('fixed-expenses.close-month', compact('fixedExpenses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        FixedExpense::create($request->all());

        if ($request->ajax()) {
            return response()->json(['success' => 'Se ha registrado de manera exitosa!']);
        } else {
            return redirect()->route('fixed-expenses.index')->with('success', 'Se ha registrado de manera exitosa!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expense = FixedExpense::find($id);
        return view('fixed-expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = FixedExpense::find($id);

        return view('fixed-expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = FixedExpense::find($id);
        $expense->update($request->all());

        return redirect()->route('fixed-expenses.index')->with('success', 'Se ha actualizado de manera exitosa!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FixedExpense::destroy($id);

        return redirect()->route('fixed-expenses.index')->with('success', 'Se ha eleminado de manera exitosa!');
    }
}
