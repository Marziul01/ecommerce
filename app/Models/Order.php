<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    private static  $user , $order , $auth;

    public static function saveInfo($request){

        $user = null;

        if (Session::has('code')){
            $coupon_code = Session::get('code')->code;
        }else{
            $coupon_code = null;
        }

        $orderNumber = Str::random(10);

        if($request->shipping == 'Yes'){
            $country = Country::where('code', $request->shipping_country)->first();
            $countryId = $country->id;
        }else{
            $country = Country::where('code', $request->country)->first();
            $countryId = $country->id;
        }

        if ($request->create_account == 'Yes'){
            self::$auth = new User();
            self::$auth->name = $request->first_name;
            self::$auth->email = $request->email;
            self::$auth->password = bcrypt($request->password);
            self::$auth->role = 1;
            self::$auth->save();

            Auth::login(self::$auth);
            $user = self::$auth->id;
        } elseif (Auth::check()) {
            // If the user is already logged in, set $user to the logged-in user's ID
            $user = Auth::user()->id;
        }

        if (isset($user)) {
            $address = ($request->shipping == 'Yes') ? $request->shipping_address : null;

            $userInfo = Userinfo::where('user_id', $user)->first();
            if (!$userInfo) {
                // If user info doesn't exist, create/update it
                Userinfo::updateInfo($user, $request, $address);
            }
        }

        if ($request->payment_option == 'cod'){
                $subtotall = Cart::subtotal(2,'.','');
                $shipping = $request->shipping_charge;
                if (isset($request->discount_charge)){
                    $discount = $request->discount_charge;
                }else{
                    $discount = 0;
                }

                $grandTotall = ($subtotall-$discount)+$shipping;

                self::$order = new Order();
                self::$order->user_id = $user;
                self::$order->subtotal = $subtotall;
                self::$order->shipping = $shipping;
                self::$order->discount = $discount;
                self::$order->grand_total = $grandTotall;
                self::$order->coupon_code = $coupon_code;
                self::$order->first_name = ($request->shipping == 'Yes') ? $request->shipping_first_name : $request->first_name;
                self::$order->last_name = ($request->shipping == 'Yes') ? $request->shipping_last_name : $request->last_name;
                self::$order->email = $request->email;
                self::$order->phone = ($request->shipping == 'Yes') ? $request->shipping_phone : $request->phone;
                self::$order->country_id = $countryId;
                self::$order->address = ($request->shipping == 'Yes') ? $request->shipping_address : $request->billing_address;
                self::$order->city = ($request->shipping == 'Yes') ? $request->shipping_city : $request->city;
                self::$order->state = ($request->shipping == 'Yes') ? $request->shipping_state : $request->state;
                self::$order->zip = ($request->shipping == 'Yes') ? $request->shipping_zipcode : $request->zipcode;
                self::$order->notes = $request->notes;
                self::$order->order_number = $orderNumber;
                self::$order->payment_option = $request->payment_option;
                self::$order->save();



        }else{
            //
        }

        $orderId = self::$order->id;

        foreach (Cart::content() as $item){
            OrderItem::details($request,$orderId,$item);
            $productData = Product::find($item->id);
            if ($productData->track_qty == 'YES'){
                $currentQty = $productData->qty;
                $updateQty = $currentQty - $item->qty;
                $productData->qty = $updateQty;
                $productData->save();
            }

        }

        Cart::destroy();
        session()->forget('code');

        // Flash a thank you message with order information to the session
//        $request->session()->flash('success', 'Thank you, ' . $request->first_name . '! Your order (ID: ' . self::$order->order_number . ') has been placed.');
        return $orderId;
    }

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function product(){
        return $this->belongsTo(Country::class);
    }

}
