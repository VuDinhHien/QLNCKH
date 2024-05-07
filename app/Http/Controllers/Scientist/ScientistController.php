<?php

namespace App\Http\Controllers\Scientist;

use App\Http\Controllers\Controller;
use App\Models\Scientist;
use Illuminate\Http\Request;

class ScientistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('scientist.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('scientist.create');
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
