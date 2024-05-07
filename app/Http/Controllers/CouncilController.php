<?php

namespace App\Http\Controllers;

use App\Models\Council;
use Illuminate\Http\Request;

class CouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Council::latest()->paginate(5);

        return view('council.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('council.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'position_name'          =>  'required',
            'only_position'         =>  'required',
            
        ]);

       

        $council = new Council;

        $council->position_name = $request->position_name;
        $council->only_position = $request->only_position;
       
   

        $council->save();

        return redirect()->route('council.index')->with('success', 'Student Added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Council $council)
    {
        //
        return view('show', compact('council'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Council $council)
    {
        //
        return view('council.edit', compact('council'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Council $council)
    {
        
        $request->validate([
            'position_name'          =>  'required',
            'only_position'         =>  'required',
            
        ]);

       

        $council = Council::find($request->hidden_id);

        $council->position_name = $request->position_name;
        $council->only_position = $request->only_position;
       
   

        $council->save();

        return redirect()->route('council.index');
        
        

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Council $council)
    {
        //
        $council->delete();

        return redirect()->route('council.index')->with('success', 'Student Data deleted successfully');

    }
}
