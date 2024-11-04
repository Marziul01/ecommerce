<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Userinfo extends Model
{
    use HasFactory;

    private static $userInfo;

    public static function updateInfo($user, $request, $address) {

            self::$userInfo = new Userinfo();

            if($request->shipping == 'Yes'){
                $country = Country::where('code', $request->shipping_country)->first();
                $countryId = $country->id;
            }else{
                $country = Country::where('code', $request->country)->first();
                $countryId = $country->id;
            }

            self::$userInfo->user_id = $user;
            self::$userInfo->first_name = $request->first_name;
            self::$userInfo->last_name = $request->last_name;
            self::$userInfo->email = $request->email;
            self::$userInfo->phone = $request->phone;
            self::$userInfo->country_id = $countryId;

            if ($address !== null) {
                self::$userInfo->shipping_address = $address;
            }
            self::$userInfo->billing_address = $request->billing_address; // Fix the typo here

            self::$userInfo->city = $request->city;
            self::$userInfo->state = $request->state;
            self::$userInfo->zip = $request->zipcode;
            self::$userInfo->save();

    }

    public function country(){
        return $this->belongsTo(Country::class);
    }


}
