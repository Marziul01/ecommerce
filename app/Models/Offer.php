<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    private static $offer,$image, $imageNewName, $dir, $imageUrl, $action;

    public static function saveInfo($request){
        self::$offer = Offer::find($request->id);
        self::$action = 'saved';

        if ($request->file('image')){
            if (self::$offer->image){
                if (file_exists(self::$offer->image)){
                    unlink(self::$offer->image);
                }
            }
            self::$offer->image = self::saveImage($request);
        }

        self::$offer->title = $request->title;
        self::$offer->subtitle = $request->subtitle;
        self::$offer->details = $request->details;
        self::$offer->price = $request->price;
        self::$offer->offerTime = $request->offerTime;
        self::$offer->offerLink = $request->offerLink;

        self::$offer->save();

        $successMessage = "Offer Settings has been " . self::$action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function saveImage($request){
        self::$image = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->extension();
        self::$dir = "frontend-assets/imgs/banner/";
        self::$imageUrl = self::$dir.self::$imageNewName;
        self::$image->move(self::$dir,self::$imageUrl);
        return self::$imageUrl;
    }

    public static function statusCheck($id){
        self::$offer = Offer::find($id);
        if (self::$offer->status == 1){
            self::$offer->status = 0;
        }else{
            self::$offer->status = 1;
        }

        self::$offer->save();
    }

}
