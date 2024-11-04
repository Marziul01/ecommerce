<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use App\Models\Temp_Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
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


    public function destroy($image_id, Request $request){
        $image = ProductImage::find($image_id);

        if (empty($image)) {
            $request->session()->flash('error','Image not found');
            return response()->json([
                'status' => false
            ]);
        }

        File::delete(asset($image->images));

        $image->delete();

        $request->session()->flash('success','Image deleted successfully');

        return response()->json([
            'status' => true
        ]);

    }
}
