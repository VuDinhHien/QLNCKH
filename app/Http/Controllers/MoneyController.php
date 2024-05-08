<?php

namespace App\Http\Controllers;

use App\Models\Money;
use Illuminate\Http\Request;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Money::latest()->paginate(5);

        return view('money.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('money.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //
         $request->validate([
            'money_name'     =>  'required',
               
        ]);

       

        $money = new Money;

        $money->money_name = $request->money_name;
        
       
   

        $money->save();

        return redirect()->route('money.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Money $money)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Money $money)
    {
        //
        return view('money.edit', compact('money'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Money $money)
    {
        //
        $request->validate([
            'money_name'     =>  'required',
               
        ]);

       

        $money = Money::find($request->hidden_id);

        $money->money_name = $request->money_name;
        
       
   

        $money->save();

        return redirect()->route('money.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Money $money)
    {
        //
        $money->delete();

        return redirect()->route('money.index');

    }
}
