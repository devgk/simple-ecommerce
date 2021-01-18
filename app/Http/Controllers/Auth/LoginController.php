<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        // Sign the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            // Redirect to dashboard
            return redirect()->route('home');
        } else {
            // Back to login page
            return back()->with('status', 'Invalid login details');
        }
    }
}
