<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\Training;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::orderBy('role_name', 'ASC')->select('id', 'role_name')->get();
        $trainings = Training::orderBy('training_name', 'ASC')->select('id', 'training_name')->get();
        $categories = Category::paginate(100);
        return view('category.index', compact('roles', 'trainings', 'categories'));

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
            'category_name' => 'required',
            'type'         => 'nullable|string',  // Trường type có thể là null hoặc chuỗi
            'role_id'      => 'required|exists:roles,id',
            'training_id'      => 'required|exists:trainings,id',
            'research_number' => 'required',
            
        ]);


        Category::create($request->all());

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $id)
    {
        //
        $category = Category::findOrFail($id);
        $roles = Role::orderBy('role_name', 'ASC')->select('id', 'role_name')->get();
        $trainings = Training::orderBy('training_name', 'ASC')->select('id', 'training_name')->get();
        return view('category.index', compact('roles', 'trainings', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
        $validatedData = $request->validate([
            'category_name' => 'required',
            'type'         => 'nullable|string',  
            'role_id'      => 'required|exists:roles,id',
            'training_id'      => 'required|exists:trainings,id',
            'research_number' => 'required',
            
        ]);


        $category = Category::findOrFail($id);

        $category->update($validatedData);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index');
    }
}
