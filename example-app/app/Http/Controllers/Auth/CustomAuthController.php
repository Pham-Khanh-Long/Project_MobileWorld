<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function customLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended route or /home
            return redirect()->intended('/home');
        }

        // Authentication failed, display error message
        $userExists = \App\Models\User::where('email', $request->email)->exists();

        if ($userExists) {
            // Email exists, but password is incorrect
            return redirect()->back()->withInput()->withErrors([
                'password' => 'Mật khẩu không chính xác. Vui lòng thử lại.',
            ]);
        } else {
            // Email does not exist
            return redirect()->back()->withInput()->withErrors([
                'email' => 'Tài khoản không tồn tại. Vui lòng kiểm tra lại email.',
            ]);
        }
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|min:4|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'agree' => 'required|accepted',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        // User::create([
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // Gửi email xác thực (nếu có)

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Đăng nhập ngay bây giờ.');
    }
    public function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function index()
    {
        if (Auth::check()) {
            return view('user.layouts.home');
        }
        return view('user.layouts.home');
        // return view('user.layouts.home');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('home');
    }
}
