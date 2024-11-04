<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public static function profile(){
        return view('admin.profile.profile',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }

    public static function profileSettings(){
        return view('admin.profile.settings',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }

    public static function profileUpdate(Request $request){
        $user = User::find($request->id);

        $rules = [
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $user->email . ',email',
        ];

// Check if password is not empty, then include password validation
        if ($request->filled('password')) {
            $rules['password'] = 'required|min:8'; // You can customize password validation rules
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {
            // Update user information
            $user->name = $request->name;
            $user->email = $request->email;

            // Check if password is not empty, then update the password
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            return redirect(route('profile'));
        } else {
            return back()->withErrors($validator);
        }
    }

}
