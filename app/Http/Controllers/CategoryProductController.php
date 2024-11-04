<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryProductController extends Controller
{
    public static function categoryProduct(Request $request, $slug, $categorySlug = null, $subCategorySlug = null)
    {
        $categorySelected = '';
        $subCategorySelected = '';
        $brandArray = [];

        $products = Product::query();

        $category = Category::where('slug', $slug)->firstOrFail();
        $products->where('category_id', $category->id);

        if (!empty($categorySlug)) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $products->where('category_id', $category->id);
            $categorySelected = $category->id;
        }
        if (!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug', $subCategorySlug)->firstOrFail();
            $products->where('sub_category_id', $subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        if (!empty($request->get('brand'))) {
            $brandArray = explode(',', $request->get('brand'));
            $products->whereIn('brand_id', $brandArray);
        }

        if ($request->filled('price_max') && $request->filled('price_min')) {
            $products->whereBetween('price', [intval($request->get('price_min')), intval($request->get('price_max'))]);
        }

        if ($request->filled('sort')) {
            if ($request->get('sort') == 'latest') {
                $products->orderBy('id', 'desc');
            } elseif ($request->get('sort') == 'featured') {
                $products->where('is_featured', 'YES')->orderBy('id', 'desc');
            } elseif ($request->get('sort') == 'low') {
                $products->orderBy('price', 'ASC');
            } else {
                $products->orderBy('price', 'DESC');
            }
        } else {
            $products->orderBy('id', 'desc');
        }

        $perPage = $request->filled('show') ? intval($request->get('show')) : 12;
        $products = $products->paginate($perPage);

        $userId = Auth::check() ? Auth::user()->id : null;

        if (!empty($request->get('search'))) {
            if ($request->get('category') == 'all_category') {
                $products = Product::where('name', 'like', '%' . $request->get('search') . '%')->paginate(12);
            } else {
                $category = Category::where('slug', $request->get('category'))->firstOrFail();
                $products = Product::where('category_id', $category->id)->where('name', 'like', '%' . $request->get('search') . '%')->paginate(12);
            }
        }

        return view('frontend.shop.category', [
            'siteSettings' => SiteSetting::findOrFail(1),
            'categories' => Category::orderBy('name', 'ASC')->where('status', '1')->with('sub_category')->get(),
            'category' => $category,
            'products' => $products,
            'brands' => Brand::orderBy('name', 'ASC')->where('status', '1')->get(),
            'categorySelected' => $categorySelected,
            'subCategorySelected' => $subCategorySelected,
            'brandsArray' => $brandArray,
            'priceMin' => intval($request->get('price_min')),
            'priceMax' => (intval($request->get('price_max')) == 0) ? 10000 : intval($request->get('price_max')),
            'sort' => $request->get('sort'),
            'show' => $request->get('show'),
            'cartContent' => Cart::content(),
            'userId' => $userId,
        ]);
    }

    public static function subCategoryProduct(Request $request, $slug, $categorySlug = null, $subCategorySlug = null)
    {
        $categorySelected = '';
        $subCategorySelected = '';
        $brandArray = [];

        $products = Product::query();

        $sub_category = SubCategory::where('slug', $slug)->firstOrFail();
        $products->where('sub_category_id', $sub_category->id);

        if (!empty($categorySlug)) {
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $products->where('category_id', $category->id);
            $categorySelected = $category->id;
        }
        if (!empty($subCategorySlug)) {
            $subCategory = SubCategory::where('slug', $subCategorySlug)->firstOrFail();
            $products->where('sub_category_id', $subCategory->id);
            $subCategorySelected = $subCategory->id;
        }

        if (!empty($request->get('brand'))) {
            $brandArray = explode(',', $request->get('brand'));
            $products->whereIn('brand_id', $brandArray);
        }

        if ($request->filled('price_max') && $request->filled('price_min')) {
            $products->whereBetween('price', [intval($request->get('price_min')), intval($request->get('price_max'))]);
        }

        if ($request->filled('sort')) {
            if ($request->get('sort') == 'latest') {
                $products->orderBy('id', 'desc');
            } elseif ($request->get('sort') == 'featured') {
                $products->where('is_featured', 'YES')->orderBy('id', 'desc');
            } elseif ($request->get('sort') == 'low') {
                $products->orderBy('price', 'ASC');
            } else {
                $products->orderBy('price', 'DESC');
            }
        } else {
            $products->orderBy('id', 'desc');
        }

        $perPage = $request->filled('show') ? intval($request->get('show')) : 12;
        $products = $products->paginate($perPage);

        $userId = Auth::check() ? Auth::user()->id : null;

        if (!empty($request->get('search'))) {
            if ($request->get('category') == 'all_category') {
                $products = Product::where('name', 'like', '%' . $request->get('search') . '%')->paginate(12);
            } else {
                $category = Category::where('slug', $request->get('category'))->firstOrFail();
                $products = Product::where('category_id', $category->id)->where('name', 'like', '%' . $request->get('search') . '%')->paginate(12);
            }
        }

        return view('frontend.shop.sub_category', [
            'siteSettings' => SiteSetting::findOrFail(1),
            'categories' => Category::orderBy('name', 'ASC')->where('status', '1')->with('sub_category')->get(),
            'sub_category' => $sub_category,
            'products' => $products,
            'brands' => Brand::orderBy('name', 'ASC')->where('status', '1')->get(),
            'categorySelected' => $categorySelected,
            'subCategorySelected' => $subCategorySelected,
            'brandsArray' => $brandArray,
            'priceMin' => intval($request->get('price_min')),
            'priceMax' => (intval($request->get('price_max')) == 0) ? 10000 : intval($request->get('price_max')),
            'sort' => $request->get('sort'),
            'show' => $request->get('show'),
            'cartContent' => Cart::content(),
            'userId' => $userId,
        ]);
    }

}
