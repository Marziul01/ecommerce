<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SiteSetting;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VariationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.variation.color',[
            'admin' => Auth::guard('admin')->user(),
            'variations' =>  Variation::whereNotNull('color')->paginate(10),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }

    public function size()
    {
        return view('admin.variation.size',[
            'admin' => Auth::guard('admin')->user(),
            'variations' =>  Variation::whereNotNull('size')->paginate(10),
            'siteSettings' => SiteSetting::where('id', 1)->first()
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
            'color' => 'required | unique:variations',
            'color_code' => 'required | unique:variations',
        ]);
        if ($validator->passes()){

            Variation::saveInfo($request);
            return redirect(route('variations.index'));

        }else{
            return back()->withErrors($validator);
        }
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'size' => 'required | unique:variations',
        ]);
        if ($validator->passes()){

            Variation::saveSizeInfo($request);
            return redirect(route('variationSize'));

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Variation::statusCheck($id);
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
        $variation = Variation::find($id);

        $validator = Validator::make($request->all(), [
            'color' => 'required | unique:variations,color,' . $variation->id .',id',
            'color_code' => 'required | unique:variations,color_code,' . $variation->id . ',id'
        ]);
        if ($validator->passes()){

            Variation::saveInfo($request,$id);
            return redirect(route('variations.index'));

        }else{
            return back()->withErrors($validator);
        }
    }

    public function updates(Request $request, string $id)
    {
        $variation = Variation::find($id);

        $validator = Validator::make($request->all(), [
            'size' => 'required | unique:variations,size,' . $variation->id .',id',
        ]);
        if ($validator->passes()){

            Variation::saveSizeInfo($request,$id);
            return redirect(route('variationSize'));

        }else{
            return back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Variation::find($id)->delete();
        return back();
    }
}
