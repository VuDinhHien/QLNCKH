<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = training::latest()->paginate(5);

        return view('training.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('training.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'training_name'     =>  'required',
               
        ]);

       

        $training = new Training;

        $training->training_name = $request->training_name;
        
       
   

        $training->save();

        return redirect()->route('training.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Training $training)
    {
        //
        return view('training.edit', compact('training'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Training $training)
    {
        //
        $request->validate([
            'training_name'     =>  'required',
               
        ]);

       

        $training = Training::find($request->hidden_id);

        $training->training_name = $request->training_name;
        
       
   

        $training->save();

        return redirect()->route('training.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        //
        $training->delete();

        return redirect()->route('training.index');
    }
}
