<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Office::latest()->paginate(5);

        return view('office.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('office.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'office_id'     =>  'required',
            'office_name'         =>  'required',
            // 'address'     =>  'required',
            // 'phone'         =>  'required',
            // 'email'     =>  'required',
            // 'office_parent'     =>  'required',
           
            
        ]);

        $office = new Office;
        
        $office->office_id= $request->office_id;
        $office->office_name = $request->office_name;
        $office->address= $request->address;
        $office->phone = $request->phone;
        $office->email= $request->email;
        $office->office_parent = $request->office_parent;
        
       
   

        $office->save();

        return redirect()->route('office.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Office $office)
    {
        //
        return view('office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        //
        $request->validate([
            'office_id'     =>  'required',
            'office_name'   =>  'required',
            // 'address'   =>  'required',
            // 'phone'      =>  'required',
            // 'email'     =>  'required',
            // 'office_parent'     =>  'required',
           
            
        ]);

       

        $office = Office::find($request->hidden_id);

        $office->office_id= $request->office_id;
        $office->office_name = $request->office_name;
        $office->address= $request->address;
        $office->phone = $request->phone;
        $office->email= $request->email;
        $office->office_parent = $request->office_parent;
        
   

        $office->save();

        return redirect()->route('office.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Office $office)
    {
        //
        $office->delete();

        return redirect()->route('office.index');
    }
}

