<?php

namespace App\Http\Controllers\Magazine;

use App\Exports\MagazinesExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\Paper;
use App\Models\Role;
use App\Models\Scientist;
use App\Exports\MagazinesArticlesExport;
use App\Models\File;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $magazines = Magazine::with(['scientists', 'scientists.magazines', 'paper','files'])->paginate(100);
        $scientists = Scientist::all();
        $roles = Role::all();
        $papers = Paper::all();

        return view('magazine.index', compact('magazines', 'scientists', 'roles', 'papers'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }


    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'magazine_name' => 'required|string|max:255',
             'year' => 'required|integer',
             'journal' => 'required|string|max:255',
             'paper_id' => 'required|exists:papers,id',
             'scientists' => 'required|array',
             'scientists.*.id' => 'required|exists:scientists,id',
             'scientists.*.role_id' => 'required|exists:roles,id',
             
         ]);
     
         
         $magazine = Magazine::create([
             'magazine_name' => $validatedData['magazine_name'],
             'year' => $validatedData['year'],
             'journal' => $validatedData['journal'],
             'paper_id' => $validatedData['paper_id'],
             
         ]);
     
         foreach ($validatedData['scientists'] as $scientist) {
             $magazine->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
         }
     
         return redirect()->route('magazine.index')->with('success', 'Thêm bài báo thành công');
     }

     public function download($fileId)
     {
         $file = File::findOrFail($fileId);
 
         $filePath = public_path('uploads/magazines/' . $file->file_path);
 
         if (file_exists($filePath)) {
             return response()->download($filePath, $file->original_name);
         } else {
             return redirect()->back()->with('error', 'File not found.');
         }
     }
    /**
     * Display the specified resource.
     */

    public function showMagazinesByScientist(Scientist $scientist)
    {
        $magazines = $scientist->magazines()->with(['scientists'])->paginate(10);
        return view('magazine.scientist_magazines', compact('magazines', 'scientist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Magazine $id)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //


        $validatedData = $request->validate([
            'magazine_name' => 'required|string|max:255',
            'year' => 'required|integer',
            'journal' => 'required|string|max:255',
            'paper_id' => 'required|exists:papers,id',
            'scientists' => 'required|array',
            'scientists.*.id' => 'required|exists:scientists,id',
            'scientists.*.role_id' => 'required|exists:roles,id',
        ]);

        $magazine = Magazine::findOrFail($id);
        $magazine->update([
            'magazine_name' => $validatedData['magazine_name'],
            'year' => $validatedData['year'],
            'journal' => $validatedData['journal'],
            'paper_id' => $validatedData['paper_id'],
        ]);

        $magazine->scientists()->detach();
        foreach ($validatedData['scientists'] as $scientist) {
            $magazine->scientists()->attach($scientist['id'], ['role_id' => $scientist['role_id']]);
        }

        return redirect()->route('magazine.index')->with('success', 'Cập nhật bài báo thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $magazine = Magazine::findOrFail($id);
        $magazine->delete();

        return redirect()->route('magazine.index')->with('success', 'Xóa bài báo thành công');
    }


    public function export()
    {
        return Excel::download(new MagazinesExport, 'magazines.xlsx');
    }
}
