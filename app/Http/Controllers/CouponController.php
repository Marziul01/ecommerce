<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Coupon;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.coupon.coupon',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first(),
            'coupons' => Coupon::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'code' => 'required|unique:coupons',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
        ]);
        if ($validator->passes()){

            Coupon::saveInfo($request);
            return redirect(route('coupons.index'));

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Coupon::statusCheck($id);
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coupon = Coupon::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:coupons,code,' . $coupon->id . ',id',
            'type' => 'required',
            'discount_amount' => 'required|numeric',
        ]);
        if ($validator->passes()){

            Coupon::saveInfo($request,$id);
            return redirect(route('coupons.index'));

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Coupon::find($id)->delete($id);
        return redirect(route('coupons.index'));
    }
}
