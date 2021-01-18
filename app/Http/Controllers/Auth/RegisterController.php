<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name'      => 'required|max:255',
            'username'  => 'required|max:255',
            'email'     => 'required|email|max:255',
            'password'  => 'required|confirmed|max:255',
        ]);

        // Store User
        $user_id = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => 3,
            'login_ip'  => $request->ip(),
            'status'    => 'active',
        ])->id;

        DB::table('role_user')->insert([
            'role_id'   => 3,
            'user_id'   => $user_id,
        ]);

        // Sign the user in
        auth()->attempt($request->only('email', 'password'));

        // Redirect
        return redirect()->route('home');
    }
}
