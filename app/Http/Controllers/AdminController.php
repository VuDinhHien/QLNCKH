<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check if the authenticated user is an admin
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index')->with('ok', 'Đăng nhập thành công');
            } else {
                // If user is not admin, redirect to user dashboard
                return redirect()->route('user.dashboard')->with('ok', 'Đăng nhập thành công');
            }
        }

        return redirect()->back()->with('no', 'Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('no', 'Đăng xuất thành công');
    }
}