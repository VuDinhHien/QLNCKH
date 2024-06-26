<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Scientist;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Thêm người dùng vào danh sách nhà khoa học
        Scientist::create([
            'user_id' => $user->id,
            'profile_name' => $request->name,
            'email' => $request->email,
            'profile_id' => $request->profile_id,
           
            // Thêm các trường khác nếu cần thiết
        ]);

        auth()->login($user);

        return redirect()->route('user.dashboard')->with('success', 'Đăng ký thành công!');
    }
}