<?php

namespace App\Http\Controllers\Magazine;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\Paper;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $papers = Paper::orderBy('paper_name', 'ASC')->select('id', 'paper_name')->get();
        $magazines = Magazine::paginate(5);
        return view('magazine.index', compact('papers', 'magazines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //


    }

    /**
     * Store a newly created resource in storage.
     */

    //
    public function store(Request $request)
    {
        $request->validate([
            'magazine_name'     =>  'required',
            'year'              =>  'required',
            'journal'           =>  'required',
            'paper_id'          =>  'required|exists:papers,id',
        ]);

        Magazine::create($request->all());

        return redirect()->route('magazine.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Magazine $magazine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magazine $id)
    {
        //
        $magazines = Magazine::findOrFail($id);
        $paper = Paper::orderBy('paper_name', 'ASC')->select('id', 'paper_name')->get();
        return view('magazine.edit', compact('magazines', 'paper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //


        $validatedData = $request->validate([
            'magazine_name'     =>  'required',
            'year'   =>  'required',
            'journal'         =>  'required',
            'paper_id'     =>  'required|exists:papers,id',
        ]);

        $magazine = Magazine::findOrFail($id);

        $magazine->update($validatedData);

        return redirect()->route('magazine.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $magazine = Magazine::findOrFail($id);
        $magazine->delete();

        return redirect()->route('magazine.index');
    }
}
