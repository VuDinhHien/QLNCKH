<?php

namespace App\Http\Controllers;

use App\Models\Arsearch;
use Illuminate\Http\Request;

class ArsearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Arsearch::latest()->paginate(5);

        return view('arsearch.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('arsearch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'arsearch_id'     =>  'required',
            'arsearch_name'         =>  'required',
            
        ]);

        $arsearch = new Arsearch;
        
        $arsearch->arsearch_id= $request->arsearch_id;
        $arsearch->arsearch_name = $request->arsearch_name;
        
       
   

        $arsearch->save();

        return redirect()->route('arsearch.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Arsearch $arsearch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsearch $arsearch)
    {
        //
        return view('arsearch.edit', compact('arsearch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsearch $arsearch)
    {
        //
        $request->validate([
            'arsearch_id'     =>  'required',
            'arsearch_name'         =>  'required',
            
        ]);

       

        $arsearch = Arsearch::find($request->hidden_id);

        $arsearch->arsearch_id = $request->arsearch_id;
        $arsearch->arsearch_name = $request->arsearch_name;
       
   

        $arsearch->save();

        return redirect()->route('arsearch.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arsearch $arsearch)
    {
        //
        $arsearch->delete();

        return redirect()->route('arsearch.index');
    }
}
