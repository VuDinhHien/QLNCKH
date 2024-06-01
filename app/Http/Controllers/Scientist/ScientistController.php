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
        $data = Scientist::orderBy('id', 'ASC')->paginate(100);
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
        // Lấy danh sách degrees và offices
        $degrees = Degree::orderBy('degree_name', 'ASC')->select('id', 'degree_name')->get();
        $offices = Office::orderBy('office_name', 'ASC')->select('id', 'office_name')->get();
        return view('scientist.create', compact('degrees', 'offices'));
  
    }

    public function showProfile(Scientist $scientist)
    {
        return view('scientist.profile', compact('scientist'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       
        $request->validate([
            'profile_id' => 'required',
            'profile_name' => 'required',
            'birthday' => 'required|date',
            'gender' => 'required',
            'birth_place' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'degree_id' => 'required|exists:degrees,id',
            'research_major' => 'nullable',
            'office_id' => 'required|exists:offices,id',
            'address_office' => 'required',
        ]);

        // Tạo một đối tượng Profile mới
        $scientist = new Scientist();

        // Gán giá trị từ request vào các thuộc tính của Profile
        $scientist->profile_id = $request->profile_id;
        $scientist->profile_name = $request->profile_name; // Sửa thành profile_name thay vì product_name
        $scientist->birthday = $request->birthday;
        $scientist->gender = $request->gender;
        $scientist->birth_place = $request->birth_place;
        $scientist->telephone = $request->telephone;
        $scientist->email = $request->email;
        $scientist->degree_id = $request->degree_id;
        $scientist->research_major = $request->research_major;
        $scientist->office_id = $request->office_id;
        $scientist->address_office = $request->address_office;

        // Lưu profile vào cơ sở dữ liệu
        $scientist->save();

        // Chuyển hướng đến trang danh sách profile
        return redirect()->route('scientist.index');
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
