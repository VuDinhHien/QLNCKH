<?php

namespace App\Http\Controllers\Curriculum;

use App\Exports\CurriculumsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Curriculum;
use App\Models\File;
use App\Models\Scientist;
use App\Models\Training;
use App\Models\Role;
use Illuminate\Http\Request;

class CurriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //


        $curriculums = Curriculum::with(['scientists', 'scientists.curriculums', 'book', 'training', 'files'])->paginate(100);
        $scientists = Scientist::all();
        $roles = Role::all();
        $books = Book::all();
        $trainings = Training::all();

        return view('curriculum.index', compact('curriculums', 'scientists', 'roles', 'books', 'trainings'));
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
        $validatedData = $request->validate([
            'name'     =>  'required',
            'year'         =>  'required',
            'publisher'         =>  'required',
            'book_id' => 'required|exists:books,id',
            'training_id' => 'required|exists:trainings,id',
            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        $curriculum =  Curriculum::create([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
            'publisher' => $validatedData['publisher'],
            'book_id' => $validatedData['book_id'],
            'training_id' => $validatedData['training_id'],
        ]);

        foreach ($validatedData['scientists'] as $scientist) {
            $curriculum->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->route('curriculum.index')->with('success', 'Thêm giáo trình/sách tham khảo thành công');
    }

    public function download($fileId)
    {
        $file = File::findOrFail($fileId);

        $filePath = public_path('uploads/curriculums/' . $file->file_path);

        if (file_exists($filePath)) {
            return response()->download($filePath, $file->original_name);
        } else {
            return redirect()->back()->with('error', 'File not found.');
        }
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
        $curriculums = $scientist->curriculums()->with(['scientists'])->paginate(10);
        return view('curriculum.scientist_curriculums', compact('curriculums', 'scientist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curriculum $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'publisher' => 'required|string|max:255',
            'book_id' => 'required|exists:books,id',
            'training_id' => 'required|exists:trainings,id',
            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        // Find the curriculum by ID
        $curriculum = Curriculum::findOrFail($id);

        // Update the curriculum with validated data
        $curriculum->update([
            'name' => $validatedData['name'],
            'year' => $validatedData['year'],
            'publisher' => $validatedData['publisher'],
            'book_id' => $validatedData['book_id'],
            'training_id' => $validatedData['training_id'],
        ]);

        // Sync scientists
        // Instead of detaching and attaching, use sync to avoid redundant operations
        $scientistsSyncData = [];
        foreach ($validatedData['scientists'] as $scientist) {
            $scientistsSyncData[$scientist['id']] = ['role_id' => $scientist['role_id']];
        }
        $curriculum->scientists()->sync($scientistsSyncData);

        // Redirect with a success message
        return redirect()->route('curriculum.index')->with('success', 'Cập nhật giáo trình/sách tham khảo thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $curriculum = Curriculum::findOrFail($id);
        $curriculum->delete();

        return redirect()->route('curriculum.index')->with('success', 'Xóa giáo trình/sách tham khảo thành công.');
    }

    public function export()
    {
        return Excel::download(new CurriculumsExport, 'curriculums.xlsx');
    }
}
