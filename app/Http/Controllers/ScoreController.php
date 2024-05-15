<?php

namespace App\Http\Controllers;

use App\Models\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Score::latest()->paginate(5);

        return view('score.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('score.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'year'   =>  'required',
            'decision_num'         =>  'required',
            'tbscore_name'   =>  'required',
            'mark'         =>  'required',
            'council'   =>  'required',
           
        ]);

        $score = new Score;
        
        $score->year= $request->year;
        $score->decision_num = $request->decision_num;
        $score->tbscore_name = $request->tbscore_name;
        $score->mark = $request->mark;
        $score->council = $request->council;
        
       
   

        $score->save();

        return redirect()->route('score.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Score $score)
    {
        //
        return view('score.edit', compact('score'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Score $score)
    {
        //
        $request->validate([
            'year'   =>  'required',
            'decision_num'         =>  'required',
            'tbscore_name'   =>  'required',
            'mark'         =>  'required',
            'council'   =>  'required',
           
        ]);

        $score = Score::find($request->hidden_id);
        
        $score->year= $request->year;
        $score->decision_num = $request->decision_num;
        $score->tbscore_name = $request->tbscore_name;
        $score->mark = $request->mark;
        $score->council = $request->council;
        
       
   

        $score->save();

        return redirect()->route('score.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Score $score)
    {
        //
        $score->delete();

        return redirect()->route('score.index');
    }
}
