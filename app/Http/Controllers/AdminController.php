<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Scientist;
use Illuminate\Support\Str; // Import lớp Str

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect()->route('admin.login')->with('no', 'Có lỗi xảy ra khi đăng nhập bằng Google');
        }

        // Kiểm tra xem người dùng đã tồn tại trong cơ sở dữ liệu chưa
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            // Nếu người dùng chưa tồn tại, tạo người dùng mới
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(Str::random(16)), // Mật khẩu ngẫu nhiên cho tài khoản
                // Thêm các trường khác nếu cần thiết
            ]);
        }

        // Kiểm tra xem người dùng đã có bản ghi trong bảng scientists chưa
        $scientist = Scientist::where('email', $googleUser->email)->first();

        if (!$scientist) {
            // Nếu chưa có bản ghi scientist, tạo mới và lưu thông tin từ Google
            $scientist = Scientist::create([
                'user_id' => $user->id,
                'profile_id' => 'generated_profile_id_here', // Thay bằng mã cần tạo tự động
                'profile_name' => $user->name,
                'email' => $user->email,
                'gender' => $googleUser->user['gender'] ?? null, // Lấy giới tính từ dữ liệu Google nếu có
               
                // Các trường thông tin khác của scientist
            ]);
        }

        // Đăng nhập người dùng
        Auth::login($user, true);

        if ($user->is_admin) {
            return redirect()->route('admin.index')->with('ok', 'Đăng nhập thành công');
        } else {
            return redirect()->route('user.dashboard')->with('ok', 'Đăng nhập thành công');
        }
    }



    public function check_login(Request $req)
    {
        $req->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin.index')->with('ok', 'Đăng nhập thành công');
            } else {
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
