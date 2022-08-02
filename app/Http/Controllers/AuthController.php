<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login ()
    {
        if (!empty(Auth::user())) {
            if (Auth::user()->can('dashboard')) {
                return redirect()->intended('dashboard');
            } else {
                return redirect()->intended('/');
            }
        }
        
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password'=> $request->password])) {
            $request->session()->regenerate();
            if (Auth::user()->can('dashboard')) {
                return redirect()->intended('admin/dashboard');
            } else {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();

        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}
