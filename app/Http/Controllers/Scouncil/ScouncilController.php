<?php

namespace App\Http\Controllers\Scouncil;

use App\Http\Controllers\Controller;
use App\Models\Lvcouncil;
use App\Models\Scouncil;
use App\Models\Tpcouncil;
use Illuminate\Http\Request;

class ScouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lvcouncils = Lvcouncil::orderBy('lvcouncils_name', 'ASC')->select('id', 'lvcouncils_name')->get();
        $tpcouncils = Tpcouncil::orderBy('tpcouncil_name', 'ASC')->select('id', 'tpcouncil_name')->get();
        $scouncils = Scouncil::paginate(5);
        return view('scouncil.index', compact('lvcouncils', 'tpcouncils', 'scouncils'));
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
        $request->validate([
            'decision_number' => 'required',
            'date' => 'required',
            'lvcouncil_id'      => 'required|exists:lvcouncils,id',
            'tpcouncil_id'      => 'required|exists:tpcouncils,id',
            'scouncil_name' => 'required',
            'year' => 'required',
        ]);


        Scouncil::create($request->all());

        return redirect()->route('scouncil.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scouncil $scouncil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scouncil $id)
    {
        //


        $scouncil = Scouncil::findOrFail($id);
        $lvcouncils = Lvcouncil::orderBy('lvcouncils_name', 'ASC')->select('id', 'lvcouncils_name')->get();
        $tpcouncils = Tpcouncil::orderBy('tpcouncil_name', 'ASC')->select('id', 'tpcouncil_name')->get();
        return view('scouncil.index', compact('scouncil', 'lvcouncils', 'tpcouncils'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'decision_number' => 'required',
            'date' => 'required|date',
            'lvcouncil_id' => 'required|exists:lvcouncils,id',
            'tpcouncil_id' => 'required|exists:tpcouncils,id',
            'scouncil_name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $scouncil = Scouncil::findOrFail($id);
        $scouncil->update($validatedData);

        return redirect()->route('scouncil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        //
        $scouncil = Scouncil::findOrFail($id);
        $scouncil->delete();

        return redirect()->route('scouncil.index');
    }
}
