<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Paper::latest()->paginate(5);

        return view('paper.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('paper.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'paper_name'     =>  'required',
               
        ]);

       

        $paper = new Paper;

        $paper->paper_name = $request->paper_name;
        
       
   

        $paper->save();

        return redirect()->route('paper.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paper $paper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paper $paper)
    {
        //
        return view('paper.edit', compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paper $paper)
    {
        //
        $request->validate([
            'paper_name'     =>  'required',
               
        ]);

        $paper = Paper::find($request->hidden_id);

        $paper->paper_name = $request->paper_name;
        
       


        $paper->save();

        return redirect()->route('paper.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paper $paper)
    {
        //
        $paper->delete();

        return redirect()->route('paper.index');
    }
}
