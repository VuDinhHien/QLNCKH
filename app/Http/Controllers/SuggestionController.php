<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Suggestion::latest()->paginate(5);

        return view('suggestion.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('suggestion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'suggestion_id'     =>  'required',
            'suggestion_name'         =>  'required',
            
        ]);

        $suggestion = new Suggestion;
        
        $suggestion->suggestion_id= $request->suggestion_id;
        $suggestion->suggestion_name = $request->suggestion_name;
        
       
   

        $suggestion->save();

        return redirect()->route('suggestion.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        //
        return view('suggestion.edit', compact('suggestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
        $request->validate([
            'suggestion_id'     =>  'required',
            'suggestion_name'         =>  'required',
            
        ]);

       

        $suggestion = Suggestion::find($request->hidden_id);

        $suggestion->suggestion_id = $request->suggestion_id;
        $suggestion->suggestion_name = $request->suggestion_name;
       
   

        $suggestion->save();

        return redirect()->route('suggestion.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suggestion $suggestion)
    {
        //
        $suggestion->delete();

        return redirect()->route('suggestion.index');
    }
}
