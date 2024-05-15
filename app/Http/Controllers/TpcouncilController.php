<?php

namespace App\Http\Controllers;

use App\Models\Tpcouncil;
use Illuminate\Http\Request;

class TpcouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Tpcouncil::latest()->paginate(5);

        return view('tpcouncil.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tpcouncil.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tpcouncil_id'   =>  'required',
            'tpcouncil_name'         =>  'required',
            
        ]);

        $tpcouncil = new Tpcouncil;
        
        $tpcouncil->tpcouncil_id= $request->tpcouncil_id;
        $tpcouncil->tpcouncil_name = $request->tpcouncil_name;
        
       
   

        $tpcouncil->save();

        return redirect()->route('tpcouncil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tpcouncil $tpcouncil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tpcouncil $tpcouncil)
    {
        //
        return view('tpcouncil.edit', compact('tpcouncil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tpcouncil $tpcouncil)
    {
        //
        $request->validate([
            'tpcouncil_id'     =>  'required',
            'tpcouncil_name'         =>  'required',
            
        ]);

       

        $tpcouncil = Tpcouncil::find($request->hidden_id);

        $tpcouncil->tpcouncil_id = $request->tpcouncil_id;
        $tpcouncil->tpcouncil_name = $request->tpcouncil_name;
       
   

        $tpcouncil->save();

        return redirect()->route('tpcouncil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tpcouncil $tpcouncil)
    {
        //
        $tpcouncil->delete();

        return redirect()->route('tpcouncil.index');
    }
}
