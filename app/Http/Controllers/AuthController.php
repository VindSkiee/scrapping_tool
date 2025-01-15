<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class AuthController extends Controller
{
    // Halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user(); // Ambil data user yang login
            session(['user_id' => $user->id]); // Simpan user_id ke session
            
            return redirect()->route('index'); // Redirect ke dashboard user
        } else{
            return back()->withErrors(['email' => 'Email or password is wrong.'])->withInput();
        }
    }
            
    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}
