<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function sign_in(Request $request)
    {
        $errorMessages = [
            'username.required' => 'Username is required.',
            'password.required' => 'Password is required.'
        ];

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], $errorMessages);

        $remember = $request->filled('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'));
        }

        return redirect()->back()
            ->withErrors(['wrong_credential' => 'Username or password is incorrect.']);
    }

    public function sign_out(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/sign_in');
    }
}
