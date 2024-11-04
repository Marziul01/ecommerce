<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    private static $variation,$action;
     public static function saveInfo($request, $id=null){

         if ($id != null){
             self::$variation = Variation::find($id);
             self::$action = 'updated';
         }else{
             self::$variation = new Variation();
             self::$action = 'added';
         }

         self::$variation->color = $request->color;
         self::$variation->color_code = $request->color_code;
         self::$variation->save();
         $successMessage = "Color has been " . self::$action . " successfully";
         $request->session()->flash('success', $successMessage);
     }
    public static function saveSizeInfo($request, $id=null){

        if ($id != null){
            self::$variation = Variation::find($id);
            self::$action = 'updated';
        }else{
            self::$variation = new Variation();
            self::$action = 'added';
        }

        self::$variation->size = $request->size;

        self::$variation->save();
        $successMessage = "Size has been " . self::$action . " successfully";
        $request->session()->flash('success', $successMessage);
    }

    public static function statusCheck($id){
        self::$variation = Variation::find($id);
                if (self::$variation->status == 1) {
                    self::$variation->status = 0;
                } else {
                    self::$variation->status = 1;
                }
                self::$variation->save();

    }


}
