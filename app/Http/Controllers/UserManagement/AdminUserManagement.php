<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserManagement extends Controller
{
    public function index(Request $request)
    {
        $users = User::orderBy('role', 'asc')->paginate(10);

        return view('admin.allUsers', [
            'users' => $users,
        ]);
    }
}
