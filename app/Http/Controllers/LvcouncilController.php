<?php

namespace App\Http\Controllers;

use App\Models\Lvcouncil;
use Illuminate\Http\Request;

class LvcouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Lvcouncil::latest()->paginate(5);

        return view('lvcouncil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lvcouncil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'lvcouncils_id'     =>  'required',
            'lvcouncils_name'         =>  'required',
            
        ]);

        $lvcouncil = new Lvcouncil;
        
        $lvcouncil->lvcouncils_id= $request->lvcouncils_id;
        $lvcouncil->lvcouncils_name = $request->lvcouncils_name;
        
       
   

        $lvcouncil->save();

        return redirect()->route('lvcouncil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lvcouncil $lvcouncil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lvcouncil $lvcouncil)
    {
        //
        return view('lvcouncil.edit', compact('lvcouncil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lvcouncil $lvcouncil)
    {
        //
         //
         $request->validate([
            'lvcouncils_id'     =>  'required',
            'lvcouncils_name'         =>  'required',
            
        ]);

       

        $lvcouncil = Lvcouncil::find($request->hidden_id);

        $lvcouncil->lvcouncils_id = $request->lvcouncils_id;
        $lvcouncil->lvcouncils_name = $request->lvcouncils_name;
       
   

        $lvcouncil->save();

        return redirect()->route('lvcouncil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lvcouncil $lvcouncil)
    {
        //
        $lvcouncil->delete();

        return redirect()->route('lvcouncil.index');
    }
}
