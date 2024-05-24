<?php

namespace App\Http\Controllers\Offer;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Propose;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $offers = Offer::paginate(5);
        $proposes = Propose::orderBy('propose_name', 'ASC')->select('id', 'propose_name')->get();
        $suggestions = Suggestion::orderBy('suggestion_name', 'ASC')->select('id', 'suggestion_name')->get();
       
        return view('offer.index', compact('proposes', 'suggestions', 'offers'));
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
        // Validate the request data
        $request->validate([
            'proposer' => 'required',
            'offer_name' => 'required',
            'propose_id' => 'required|exists:proposes,id',
            'suggestion_id' => 'required|exists:suggestions,id',
            'note' => 'nullable'
        ]);
    
        // Create a new offer using the validated data
        Offer::create($request->all());
    
        // Redirect to the index route with a success message
        return redirect()->route('offer.index');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $id)
    {
        //
        $offer = Offer::findOrFail($id);
        $proposes = Propose::orderBy('propose_name', 'ASC')->select('id', 'propose_name')->get();
        $suggestions = Suggestion::orderBy('suggestion_name', 'ASC')->select('id', 'suggestion_name')->get();
        return view('offer.index', compact('offer', 'proposes', 'suggestions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $validatedData = $request->validate([
            'proposer' => 'required',
            'year' => 'required',
            'offer_name'      => 'required',
            'propose_id'      => 'required|exists:proposes,id',
            'suggestion_id' => 'required|exists:suggestions,id',
            
        ]);

        $offer = Offer::findOrFail($id);
        $offer->update($validatedData);

        return redirect()->route('offer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect()->route('offer.index');
    }
}
