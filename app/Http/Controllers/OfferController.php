<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class OfferController extends Controller
{


    public static function offerSave(Request $request)
    {
        Offer::saveInfo($request);
        return back();

    }
    public function offerShow( $id)
    {
        Offer::statusCheck($id);
        return back();
    }
}
