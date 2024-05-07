<?php

namespace App\Http\Controllers;

use App\Models\Lvtopic;
use Illuminate\Http\Request;

class LvtopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Lvtopic::latest()->paginate(5);

        return view('lvtopic.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('lvtopic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'lvtopic_name'     =>  'required',
            'category'         =>  'required',
            
        ]);

       

        $lvtopic = new Lvtopic;

        $lvtopic->lvtopic_name = $request->lvtopic_name;
        $lvtopic->category = $request->category;
       
   

        $lvtopic->save();

        return redirect()->route('lvtopic.index')->with('success', 'Student Added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Lvtopic $lvtopic)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lvtopic $lvtopic)
    {
        //
        return view('lvtopic.edit', compact('lvtopic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lvtopic $lvtopic)
    {
        //
        $request->validate([
            'lvtopic_name'     =>  'required',
            'category'         =>  'required',
            
        ]);

       

        $lvtopic = Lvtopic::find($request->hidden_id);

        $lvtopic->lvtopic_name = $request->lvtopic_name;
        $lvtopic->category = $request->category;
       
   

        $lvtopic->save();

        return redirect()->route('lvtopic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lvtopic $lvtopic)
    {
        //
        $lvtopic->delete();

        return redirect()->route('lvtopic.index');
    }
}
