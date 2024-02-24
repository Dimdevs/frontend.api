<?php

namespace App\Http\Controllers\Admin;

// Library Local
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

// Library Installer
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public $view = 'admin.pages.auth.';
    public $route = 'admin.';
    public $title = 'Authentikasi';

    public function __construct()
    {
        View::share('route', $this->route);
        View::share('view', $this->view);
        View::share('title', $this->title);
    }

    public function login()
    {
        return view($this->view . 'login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $role = Auth::user()->role;
            $indicators = 1;
            if($indicators == 1) {
                switch ($role) {
                    case 'super_admin':
                    case 'admin':
                        Alert::success('Login Berhasil !', 'Selamat Anda Berhasil Login !.')->persistent(true);
                        return redirect()->route($this->route . 'dashboard');
                        break;
                }
            } else {
                Auth::logout();
                Alert::error('Gagal!', 'Akun Anda Di Non Aktifkan.')->persistent(true);
                return back();
            }
        }

        Alert::error('Gagal!', 'Email atau kata sandi salah.')->persistent(true);
        return back();
    }

    public function logout()
    {
        Auth::logout();
        Alert::success('Log Out Berhasil!', 'Akun Anda Telah Berhasil Log Out.')->persistent(true);
        return redirect()->route($this->route . 'login');
    }
}
