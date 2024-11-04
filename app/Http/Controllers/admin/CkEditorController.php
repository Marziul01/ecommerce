<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use function League\Flysystem\move;

class CkEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();
            $filename = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $Newfilename = $filename .'-'. rand().'.'.$extension;
            $url = asset('admin-assets/img/products/'.$Newfilename);
            $request->file('upload')->move(public_path('admin-assets/img/products/'), $Newfilename);
            return response()->json(['filename' => $Newfilename,'uploaded'=> 1, 'url' => $url,]);

        }else{
            return response()->json(['error' => 'No file uploaded.']);
        }

    }
}
