<?php

namespace App\Http\Controllers;

use App\Models\Seminar;
use Illuminate\Http\Request;

class SeminarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Seminar::latest()->paginate(5);

        return view('seminar.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('seminar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'seminar_name'     =>  'required',
               
        ]);

       

        $seminar = new Seminar;

        $seminar->seminar_name = $request->seminar_name;
        
       
   

        $seminar->save();

        return redirect()->route('seminar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Seminar $seminar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seminar $seminar)
    {
        //
        return view('seminar.edit', compact('seminar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Seminar $seminar)
    {
        //
         //
         $request->validate([
            'seminar_name'     =>  'required',
               
        ]);

       

        $seminar = Seminar::find($request->hidden_id);

        $seminar->seminar_name = $request->seminar_name;
        
       
   

        $seminar->save();

        return redirect()->route('seminar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seminar $seminar)
    {
        //
        $seminar->delete();

        return redirect()->route('seminar.index');
    }
}
