<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (session()->has('admin_id')) return redirect()->route('admin.dashboard');
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email'    => ['required','email','max:191'],
            'password' => ['required','string'],
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withInput()->with('error', 'Email atau password salah.');
        }

        // login sukses
        session(['admin_id' => $user->id, 'admin_name' => $user->name]);
        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget(['admin_id','admin_name']);
        return redirect()->route('admin.login')->with('success', 'Anda telah keluar.');
    }
}
