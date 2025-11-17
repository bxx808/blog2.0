<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth');
    }

    public function auth(AuthRequest $request)
    {
        $credentials = $request->validated();
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'Не верные данные']);
    }
}
