<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Models\User;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.auth');
    }

    public function auth(AuthRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'Не верные данные']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function signup(SignupRequest $request)
    {
        try {
            $data = $request->validated();
            $data['role'] = User::ROLE_READER;
            $data['password'] = Hash::make($data['password']);
            $user = User::create($data);
            Auth::login($user);
            return redirect()->route('home')->with('success', 'Аккаунт создан!');
        } catch (UniqueConstraintViolationException $e) {
            return back()->with('error', 'Этот email уже занят!')->withInput();
        }
    }
}
