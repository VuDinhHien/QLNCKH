<?php

namespace App\Http\Controllers\Scientist;

use App\Http\Controllers\Controller;
use App\Models\Scientist;
use App\Models\Degree;
use App\Models\Office;
use Illuminate\Http\Request;

class ScientistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Scientist::orderBy('id', 'ASC')->paginate(10);
        $degrees = Degree::orderBy('degree_name', 'ASC')->select('id', 'degree_name')->get();
        $offices = Office::orderBy('office_name', 'ASC')->select('id', 'office_name')->get();
        return view('scientist.index', compact('data','degrees', 'offices'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Scientist $scientist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scientist $scientist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scientist $scientist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Scientist $scientist)
    {
        //
    }
}
