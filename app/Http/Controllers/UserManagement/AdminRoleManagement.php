<?php

namespace App\Http\Controllers\UserManagement;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminRoleManagement extends Controller
{
    public function index(User $user, Request $request)
    {
        $user = User::where('id', $user->id)->first();

        return view('admin.userRoleManagement', [
            'user' => $user,
        ]);
    }

    public function store(User $user, Request $request)
    {
        $role_input = $request->role;

        $roles = Role::get()->pluck('id', 'name');

        $role_id = 3;

        foreach ($roles as $key => $value) {
            if ($role_input == (int)$value) {
                $role_id = (int)$value;
            }
        }

        User::where('id', $user->id)->update(array(
            'role' => $role_id,
        ));

        // Delete Old Records
        DB::table('role_user')->where('user_id', $user->id)->delete();

        $number_of_roles = count($roles);

        while ($role_id <= $number_of_roles) {
            DB::table('role_user')->insert([
                'role_id' => $role_id,
                'user_id' => $user->id,
            ]);

            $role_id++;
        }

        return back();
    }
}
