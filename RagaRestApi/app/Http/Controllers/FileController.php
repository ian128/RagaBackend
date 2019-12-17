<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function photoList(Request $request)
    {
        $id = $request->id;
        $fileName = $id.".jpg";
        return response()->download(public_path($fileName),'User Photo');
    }
    public function photoSave(Request $request)
    {
        $id = $request->id;
        $fileName = $id.".jpg";
        $path = $request->file('photo_profile')->move(public_path("/"),'lalalen.jpg');
        $photoUrl = url("/".$fileName);
        return response()->json(["url"=>$photoUrl],200);
    }
}
