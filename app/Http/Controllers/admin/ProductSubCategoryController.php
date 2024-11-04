<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    public static function index(Request $request){

        if (!empty($request->category_id)){
            $subcategory = SubCategory::where('category_id', $request->category_id)
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->get();


            return response()->json([
                'status' => true,
                'subCategory' => $subcategory,
            ]);


        }else{

            return response()->json([
                'status' => true,
                'subCategory' => [],
            ]);

        }

    }

}
