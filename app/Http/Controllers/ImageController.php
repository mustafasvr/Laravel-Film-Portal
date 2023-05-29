<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public static function ImageUpload($image, $path = null)
    {

        $path_url = public_path('images/' . $path);

        $filename = Str::random(32) . "." . $image->getClientOriginalExtension();
        $image->move($path_url, $filename);

        return $filename;
    }

    public static function ImageDelete($image, $path)
    {
        $path_url = public_path('images/' . $path);
        $deleteFile = $path_url . '/' . $image;
        File::delete($deleteFile);
    }


}
