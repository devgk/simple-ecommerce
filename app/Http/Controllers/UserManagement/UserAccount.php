<?php

namespace App\Http\Controllers\UserManagement;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAccount extends Controller
{
    public function index()
    {
        return view('pages.account');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mobile'    => 'required|digits:10',
            'address'   => 'required|max:255',
            'district'  => 'required|max:255',
            'city'      => 'required|max:255',
            'state'     => 'required|max:255',
            'country'   => 'required|max:255',
        ]);

        $profile_image_path = '';

        if ($request->hasFile('image')) {
            $name = strtolower(str_replace(' ', '-', $request->user()->name)) . '-' . time();
            $extension = $request->image->extension();

            $profile_image_path = $request->image->storeAs(
                'profile-images',
                $name . '.' . $extension,
                'public'
            );
        }
        else if(!empty($request->user()->profile_image)){
          $profile_image_path = $request->user()->profile_image;
        }

        User::where('id', $request->user()->id)->update(array(
            'mobile'        => $request->mobile,
            'address'       => $request->address,
            'district'      => $request->district,
            'city'          => $request->city,
            'state'         => $request->state,
            'country'       => $request->country,
            'profile_image' => $profile_image_path,
        ));

        return back();
    }
}
