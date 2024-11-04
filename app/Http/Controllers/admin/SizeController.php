<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Variation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SizeController extends Controller
{
    public function size()
    {
        return view('admin.variation.size',[
            'admin' => Auth::guard('admin')->user(),
            'variations' =>  Variation::whereNotNull('color')->paginate(10),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }
}
