<?php

namespace App\Http\Controllers\Conference;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use App\Models\Seminar;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $seminars = Seminar::orderBy('seminar_name', 'ASC')->select('id', 'seminar_name')->get();
        $conferences = Conference::paginate(5);
        return view('conference.index', compact('seminars', 'conferences'));
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
            'conference_name' => 'required',
            'seminar_id'      => 'required|exists:seminars,id',
            'office'          => 'nullable',
            'unit'            => 'nullable',
            'money'           => 'nullable',
            'status_name'     => 'nullable',
            'date'            => 'required',
        ]);


        Conference::create($request->all());

        return redirect()->route('conference.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $id)
    {
        //
        $conferences = Conference::findOrFail($id);
        $seminar = Seminar::orderBy('seminar_name', 'ASC')->select('id', 'seminar_name')->get();
        return view('conference.edit', compact('conferences', 'seminar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'conference_name' => 'required',
            'seminar_id'      => 'required|exists:seminars,id',
            'office'          => 'nullable',
            'unit'            => 'nullable',
            'money'           => 'nullable',
            'status_name'     => 'nullable',
            'date'            => 'required',
        ]);

        $conference = Conference::findOrFail($id);

        $conference->update($validatedData);

        return redirect()->route('conference.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $conference = Conference::findOrFail($id);
        $conference->delete();

        return redirect()->route('conference.index');
    }
}
