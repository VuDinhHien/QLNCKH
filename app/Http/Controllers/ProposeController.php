<?php

namespace App\Http\Controllers;

use App\Models\Propose;
use Illuminate\Http\Request;

class ProposeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Propose::latest()->paginate(5);

        return view('propose.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('propose.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'propose_name'     =>  'required',
               
        ]);

       

        $propose = new Propose;

        $propose->propose_name = $request->propose_name;
        
       
   

        $propose->save();

        return redirect()->route('propose.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Propose $propose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Propose $propose)
    {
        //
        return view('propose.edit', compact('propose'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Propose $propose)
    {
        //
         //
         $request->validate([
            'propose_name'     =>  'required',
               
        ]);

       

        $propose = Propose::find($request->hidden_id);

        $propose->propose_name = $request->propose_name;
        
       
   

        $propose->save();

        return redirect()->route('propose.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Propose $propose)
    {
        //
        $propose->delete();

        return redirect()->route('propose.index');

    }
}
