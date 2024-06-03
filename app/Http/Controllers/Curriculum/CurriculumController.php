<?php

namespace App\Http\Controllers\Curriculum;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Curriculum;
use App\Models\Scientist;
use App\Models\Training;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $scientists = Scientist::orderBy('profile_name', 'ASC')->select('id', 'profile_name')->get();
        $trainings = Training::orderBy('training_name', 'ASC')->select('id', 'training_name')->get();
        $books = Book::orderBy('book_name', 'ASC')->select('id', 'book_name')->get();
        $curriculums = Curriculum::paginate(100);
        return view('curriculum.index', compact('scientists', 'trainings', 'books', 'curriculums'));
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
            'name'     =>  'required',
            'year'         =>  'required',
            'publisher'         =>  'required',
            'profile_id'     =>  'required|exists:scientists,id',
            
            'book_id'     =>  'required|exists:books,id',
            
            'training_id'     =>  'required|exists:trainings,id',
        ]);


        Curriculum::create($request->all());

        return redirect()->route('curriculum.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curriculum $curriculum)
    {
        //
    }

    public function showCurriculumsByScientist(Scientist $scientist)
    {
        $curriculums = $scientist->curriculums()->paginate(10);
        return view('curriculum.scientist_curriculums', compact('curriculums', 'scientist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $id)
    {
        //
        $curriculum = Curriculum::findOrFail($id);
        $scientists = Scientist::orderBy('profile_name', 'ASC')->select('id', 'profile_name')->get();
        $trainings = Training::orderBy('training_name', 'ASC')->select('id', 'training_name')->get();
        $books = Book::orderBy('book_name', 'ASC')->select('id', 'book_name')->get();
        
        return view('curriculum.index', compact('scientists', 'trainings', 'books', 'curriculum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            'name'     =>  'required',
            'year'         =>  'required',
            'publisher'         =>  'required',
            'profile_id'     =>  'required|exists:scientists,id',
            
            'book_id'     =>  'required|exists:books,id',
            
            'training_id'     =>  'required|exists:trainings,id',

        ]);

        $curriculum = Curriculum::findOrFail($id);
        $curriculum->update($validatedData);

        return redirect()->route('curriculum.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();

        return redirect()->route('curriculum.index');
    }
}
