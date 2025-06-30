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
        return view("imageDownloader", compact("allImages"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "imageUrl" => 'required|url'
        ]);

        $file = file_get_contents($request->imageUrl); // bzch nzkhod l file  mn   l code 

        $extension = pathinfo(parse_url($request->imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION); // bach nakhod extension


        $fileName = hash("sha256", $file) . time() . "." . $extension; // generate a  unoque name

        if ($extension == "pdf") {
            # code...
            return back()->with("error", "pdf not accepted");
        }

        Storage::disk("public")->put("images/{$fileName}", $file); // bach n storih fl projet

        // insert 

        Imager::create([
            "url" => $fileName
        ]);
        // flasher  php   -  
        // flash()->success("kolchi chwya mzn");
        return back()->with("success", "all good");
    }


    public function storeFile(Request $request)
    {

        // dd($request->all());
        $request->validate([
            "file" => "required|mimes:png,jpg,svg|max:2048"
        ]);

        $path = $request->file("file")->store("images" , "public");

        // dd($path);

        Imager::create([
            "url" => $path
        ]);
        

        return back()->with("success" , "All good");
    }
}
