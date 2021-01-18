<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminAddUser extends Controller
{
    private function get_roles($type = null)
    {
        if ('names' == $type) {
            return Role::get()->pluck('name');
        } else {
            return Role::get()->pluck('id', 'name');
        }

    }

    public function index(Request $request)
    {
        return view('admin.addUser', [
            'roles' => $this->get_roles('names'),
        ]);
    }

    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name'      => 'required|max:255',
            'username'  => 'required|max:255',
            'email'     => 'required|email|max:255',
            'password'  => 'required|max:255',
            'role'      => 'required',
        ]);

        $roles = $this->get_roles();

        $role_id = 3;

        foreach ($roles as $key => $value) {
            if ($request->role == $key) {
                $role_id = (int)$value;
            }
        }

        // Store User
        $user_id = User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'role'      => $role_id,
            'login_ip'  => $request->ip(),
            'status'    => 'active',
        ])->id;

        $number_of_roles = count($roles);

        while ($role_id <= $number_of_roles) {
            DB::table('role_user')->insert([
                'role_id' => $role_id,
                'user_id' => $user_id,
            ]);

            $role_id++;
        }

        // Redirect to all users page
        return redirect()->route('admin.allUsers');
    }
}
