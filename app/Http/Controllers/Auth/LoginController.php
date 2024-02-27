<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //
    public function viewLogin() {
        return view('Auth.Login');
    }
    public function login(Request $request) {

        $credenciales = request()->only('email','password');
        // $credenciales = request()->validate();
        // return $credenciales;
        $remember = request()->filled('remember');
        if (Auth::attempt($credenciales)) {
            request()->session()->regenerate();
            // return Auth::user();
            return redirect()->intended('dyls/dashboard');
        }
        return redirect('login')->with('status','Credenciales incorrectas');
    }
    function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        // return redirect()->route('login');
        return redirect('login')->with('status','Usted a cerrado sesión');
    }
}
