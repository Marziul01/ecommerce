<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SiteSetting;
use App\Models\User;
use App\Models\Userinfo;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class UserProfileController extends Controller
{
    public static function index(){

        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $country = Country::where('code', 'BD')->first();
        $states = explode(',', $country->states);
        sort($states);
        $userInfo = Userinfo::where('user_id', Auth::user()->id)->first();

        return view('frontend.profile.profile',[
            'siteSettings' => SiteSetting::where('id', 1)->first(),
            'categories' => Category::orderBy('name', 'ASC')->where('status', '1')->with('sub_category')->get(),
            'cartContent' => Cart::content(),
            'orders' => $orders,
            'user' => User::where('id', Auth::user()->id)->first(),
            'country' => $country,
            'states' => $states,
            'userInfo' => $userInfo,
        ]);
    }

    public static function updateAddress(Request $request, $id){
        if ($id == Auth::user()->id){
            $address = Userinfo::where('user_id', $id)->first();
            $address->country_id = $request->country;
            $address->state = $request->billing_state;
            $address->billing_address = $request->billing_address;
            $address->save();
            $successMessage = "Billing Address has been updated successfully";
            $request->session()->flash('success', $successMessage);
            return redirect(route('user.profile'));
        }
        else{
            return back()->withErrors('User ID dose not match !' );
        }

    }

    public static function updateShippingAddress(Request $request, $id){
        if ($id == Auth::user()->id) {
            $address = Userinfo::where('user_id', $id)->first();
            $address->country_id = $request->country;
            $address->shipping_state = $request->shipping_state;
            $address->shipping_address = $request->shipping_address;
            $address->save();
            $successMessage = "Shipping Address has been updated successfully";
            $request->session()->flash('success', $successMessage);
            return redirect(route('user.profile'));
        }
        else{
            return back()->withErrors('User ID dose not match !' );
        }
    }

    public static function updateUserInfo(Request $request, $id)
    {
        if ($id == Auth::user()->id) {
            $user = User::where('id', Auth::user()->id)->first();

            // Separate validation for email
            $emailValidator = Validator::make($request->only('email'), [
                'email' => 'required|unique:users,email,' . $user->id . ',id',
            ]);

            if ($emailValidator->fails()) {
                return back()->withErrors($emailValidator);
            }

            $rules = [
                'name' => 'required',
            ];

            if ($request->filled('password')) {
                $rules['password'] = 'required|min:6';
                $rules['confirm_password'] = 'required|same:password';
                $rules['old_password'] = 'required';
            }

            // Validation for other fields
            $validator = Validator::make($request->all(), $rules);

            if ($validator->passes()) {
                // Update user information
                $userInfo = Userinfo::where('user_id', $id)->first();
                $userInfo->first_name = $request->first_name;
                $userInfo->last_name = $request->last_name;
                $userInfo->email = $request->email;
                $userInfo->phone = $request->phone;
                $userInfo->save();

                $user->name = $request->name;
                $user->email = $request->email;// Note: This might be redundant if the email hasn't changed

                if ($request->filled('password')) {
                    if (Hash::check($request->old_password, $user->password)) {
                        $user->password = Hash::make($request->password);
                    } else {
                        return back()->withErrors('Old Password is not correct!');
                    }
                }

                $user->save();

                $successMessage = "Account Details have been updated successfully";
                $request->session()->flash('success', $successMessage);
                return redirect(route('user.profile'));
            } else {
                return back()->withErrors($validator);
            }
        } else {
            return back()->withErrors('User ID does not match!');
        }
    }


    public static function orderDetail($id){

        $order = Order::find($id);

        return view('frontend.profile.orderDetail',[
            'siteSettings' => SiteSetting::where('id', 1)->first(),
            'categories' => Category::orderBy('name', 'ASC')->where('status', '1')->with('sub_category')->get(),
            'cartContent' => Cart::content(),
            'order' => $order,
        ]);
    }

}
