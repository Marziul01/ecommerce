<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function Nette\Utils\first;
use Gloudemans\Shoppingcart\Facades\Cart;

class ProductDetailsController extends Controller
{
    public static function index($slug){

        $product = Product::where('slug', $slug)->first();
        $category = $product->sub_category_id;
        $relatedProducts = SubCategory::where('id', $category)->with('product')->first();
        $selectedColors = !empty($product->colors) ? explode(',', $product->colors) : null;
        $selectedSizes = !empty($product->sizes) ? explode(',', $product->sizes) : null;

        if (Auth::check()){
            $userId = Auth::user()->id;
        }else{
            $userId = null;
        }
        if( $product->ratings->where('status',1)->count() > 0 ){
            $validRatings = $product->ratings->where('status', 1);
            $totalValidRatings = $validRatings->count();
            $averageRating = $totalValidRatings > 0 ? $validRatings->sum('rating') / $totalValidRatings : 0;
            if ($product->ratings->where('status',1)->where('rating', 5.00)->count() > 0){
                $star5 = ($product->ratings->where('status',1)->where('rating', 5.00)->count()*100)/$product->ratings->where('status',1)->count();
            }else{
                $star5 = 0;
            }
            if ($product->ratings->where('status',1)->where('rating', 4.00)->count() > 0){
                $star4 = ($product->ratings->where('status',1)->where('rating', 4.00)->count()*100)/$product->ratings->where('status',1)->count();
            }else{
                $star4 = 0;
            }
            if ($product->ratings->where('status',1)->where('rating', 3.00)->count() > 0){
                $star3 = ($product->ratings->where('status',1)->where('rating', 3.00)->count()*100)/$product->ratings->where('status',1)->count();
            }else{
                $star3 = 0;
            }
            if ($product->ratings->where('status',1)->where('rating', 2.00)->count() > 0){
                $star2 = ($product->ratings->where('status',1)->where('rating', 2.00)->count()*100)/$product->ratings->where('status',1)->count();
            }else{
                $star2 = 0;
            }
            if ($product->ratings->where('status',1)->where('rating', 1.00)->count() > 0){
                $star1 = ($product->ratings->where('status',1)->where('rating', 1.00)->count()*100)/$product->ratings->where('status',1)->count();
            }else{
                $star1 = 0;
            }
        }else{
            $averageRating = 0;
            $star1 = 0;
            $star2 = 0;
            $star3 = 0;
            $star4 = 0;
            $star5 = 0;
        }

        if (isset($product)){
            return view('frontend.product.product',[
                'siteSettings' => SiteSetting::where('id', 1)->first(),
                'categories' => Category::orderBy('name', 'ASC')->where('status', '1')->with('sub_category')->get(),
                'brand' => Brand::orderBy('name', 'ASC')->where('status', '1')->get(),
                'product' => Product::where('slug',$slug)->first(),
                'products' => Product::where('status',1)->get(),
                'relatedProducts' => $relatedProducts,
                'colors' => $selectedColors,
                'sizes' => $selectedSizes,
                'cartContent' => Cart::content(),
                'userId' => $userId,
                'averageRating' => number_format($averageRating,1),
                'star1' => number_format($star1,2),
                'star2' => number_format($star2,2),
                'star3' => number_format($star3,2),
                'star4' => number_format($star4,2),
                'star5' => number_format($star5,2),
            ]);
        }else{
            abort(404);
        }


    }
}
