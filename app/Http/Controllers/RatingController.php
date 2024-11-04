<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\SiteSetting;
use App\Models\User;
use App\Notifications\NewReviewNotfication;
use App\Notifications\NewUserNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public static function submitReview(Request $request){
        $validator = Validator::make($request->all(),[
            'product_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required',
            'rating' => 'required',
        ]);
        if ($validator->passes()){
            $admin = User::where('role', 0)->first();
            Rating::saveInfo($request);
            $product = Product::where('id', $request->product_id)->first();
            $name = $product->name;
            $data = [
              'product' =>  $name,
              'rating' =>  $request->rating,
            ];
            Notification::send($admin, new NewReviewNotfication($data));
            return back();
        }else{
            return back()->withErrors($validator);
        }
    }

    public static function reviews(){

        return view('admin.reviews.reviews',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first(),
            'reviews' => Rating::latest()->paginate(10),
        ]);
    }

    public static function reviewDestroy(Request $request, $id){
        $rating = Rating::find($id);
        if (isset($rating)){
            $rating->delete();
            $successMessage = "Your Review has been deleted";
            $request->session()->flash('success', $successMessage);
            return back();
        }
    }

    public static function reviewShow($id){
        Rating::statusCheck($id);
        return back();
    }
}
