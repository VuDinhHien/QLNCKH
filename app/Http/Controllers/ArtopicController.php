<?php

namespace App\Http\Controllers;

use App\Models\Artopic;
use Illuminate\Http\Request;

class ArtopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Artopic::latest()->paginate(5);

        return view('artopic.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('artopic.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'artopic_id'     =>  'required',
            'artopic_name'         =>  'required',
            
        ]);

        $artopic = new Artopic;
        
        $artopic->artopic_id= $request->artopic_id;
        $artopic->artopic_name = $request->artopic_name;
        
       
   

        $artopic->save();

        return redirect()->route('artopic.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artopic $artopic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artopic $artopic)
    {
        //
        return view('artopic.edit', compact('artopic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artopic $artopic)
    {
        //
        $request->validate([
            'artopic_id'     =>  'required',
            'artopic_name'         =>  'required',
            
        ]);

       

        $artopic = Artopic::find($request->hidden_id);

        $artopic->artopic_id = $request->artopic_id;
        $artopic->artopic_name = $request->artopic_name;
       
   

        $artopic->save();

        return redirect()->route('artopic.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artopic $artopic)
    {
        //
        $artopic->delete();

        return redirect()->route('artopic.index');
    }
}
