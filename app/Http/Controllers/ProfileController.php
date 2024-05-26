<?php

namespace App\Http\Controllers;

use App\Models\Degree;
use App\Models\Office;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Profile::orderBy('id', 'ASC')->paginate(10);
        return view('profile.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy danh sách degrees và offices
        $degrees = Degree::orderBy('degree_name', 'ASC')->select('id', 'degree_name')->get();
        $offices = Office::orderBy('office_name', 'ASC')->select('id', 'office_name')->get();
        return view('profile.create', compact('degrees', 'offices'));
    }

    /**
     * Lưu một tài nguyên mới vào cơ sở dữ liệu.
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
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
        $profile = new Profile();

        // Gán giá trị từ request vào các thuộc tính của Profile
        $profile->profile_id = $request->profile_id;
        $profile->profile_name = $request->profile_name; // Sửa thành profile_name thay vì product_name
        $profile->birthday = $request->birthday;
        $profile->gender = $request->gender;
        $profile->birth_place = $request->birth_place;
        $profile->telephone = $request->telephone;
        $profile->email = $request->email;
        $profile->degree_id = $request->degree_id;
        $profile->research_major = $request->research_major;
        $profile->office_id = $request->office_id;
        $profile->address_office = $request->address_office;

        // Lưu profile vào cơ sở dữ liệu
        $profile->save();

        // Chuyển hướng đến trang danh sách profile
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
        $degrees = Degree::orderBy('degree_name', 'ASC')->select('id', 'degree_name')->get();
        $offices = Office::orderBy('office_name', 'ASC')->select('id', 'office_name')->get();
        return view('profile.show', compact('degrees', 'offices', 'profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
        $degrees = Degree::orderBy('degree_name', 'ASC')->select('id', 'degree_name')->get();
        $offices = Office::orderBy('office_name', 'ASC')->select('id', 'office_name')->get();
        return view('profile.edit', compact('degrees', 'offices', 'profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Profile $profile)
    {
        //
        // Validate the request data
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

        // Assign the validated values to the profile attributes
        $profile->profile_id = $request->profile_id;
        $profile->profile_name = $request->profile_name;
        $profile->birthday = $request->birthday;
        $profile->gender = $request->gender;
        $profile->birth_place = $request->birth_place;
        $profile->telephone = $request->telephone;
        $profile->email = $request->email;
        $profile->degree_id = $request->degree_id;
        $profile->research_major = $request->research_major;
        $profile->office_id = $request->office_id;
        $profile->address_office = $request->address_office;

        // Save the updated profile
        $profile->save();

        // Redirect to the profile index page
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
        $profile->delete();

        return redirect()->route('profile.index');
    }
}
