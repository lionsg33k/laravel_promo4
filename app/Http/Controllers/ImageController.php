<?php

namespace App\Http\Controllers;

use App\Models\Imager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    //

    public function index()
    {
        $allImages = Imager::all();
        return view("imageDownloader" , compact("allImages"));
    }

    public function store(Request $request)
    {


        $request->validate([
            "imageUrl" => 'required|url'
        ]);

        $file = file_get_contents($request->imageUrl); // bzch nzkhod l file  mn   l code 

        $extension = pathinfo(parse_url($request->imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION); // bach nakhod extension


        $fileName = hash("sha256", $file) . time() . "." . $extension; // generate a  unoque name

        Storage::disk("public")->put("images/{$fileName}", $file); // bach n storih fl projet

        // insert 

        Imager::create([
            "url" => $fileName
        ]);

        return back();
    }
}
