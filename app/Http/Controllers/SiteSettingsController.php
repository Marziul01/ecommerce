<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteSettingsController extends Controller
{
    public static function header(){
        return view('admin.sitesettings.headersettings',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }
    public static function footer(){
        return view('admin.sitesettings.footersettings',[
            'admin' => Auth::guard('admin')->user(),
            'siteSettings' => SiteSetting::where('id', 1)->first()
        ]);
    }
    public static function update(Request $request){
        SiteSetting::updateInfo($request);
        return back();
    }
    public static function updateHeader(Request $request){
        SiteSetting::updateHeader($request);
        return back();
    }
    public static function updateFooter(Request $request){
        SiteSetting::updateFooter($request);
        return back();
    }
}
