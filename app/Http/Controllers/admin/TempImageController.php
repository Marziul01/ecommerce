<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Temp_Image;
use Illuminate\Http\Request;

class TempImageController extends Controller
{
    public function store(Request $request){
        if (!empty($request->image)) {
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();

            $tempImage = new Temp_Image();


            $imageName = time().rand().'.'.$ext;

            $tempImage->images = $imageName;

            $image->move(public_path('admin-assets/img/products/temp_images/'),$imageName);
            $tempImage->save();
            return response()->json([
                'status' => true,
                'image_id' => $tempImage->id,
                'name' => $imageName,
                'imagePath' => asset('admin-assets/img/products/temp_images/'.$imageName)
            ]);
        }
    }
}
