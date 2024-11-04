<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Ramsey\Collection\Map\get;

class AdminLoginController extends Controller
{

    static protected $admin;

    public static function index(){
        return view('admin.auth.login');
    }

    public static function authenticate(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->get('remember'))){

                self::$admin = Auth::guard('admin')->user();

                if (self::$admin->role == 0){
                    return redirect(route('admin.dashboard'));
                }else{
                    Auth::guard('admin')->logout();
                    return redirect(route('admin.login'))->with('error', 'You are not Authorized to access Admin Panel' );
                }


            }else{
                return redirect(route('admin.login'))->with('error', 'Either Email/Password is incorrect' );
            }

        }else {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }

    }

}
