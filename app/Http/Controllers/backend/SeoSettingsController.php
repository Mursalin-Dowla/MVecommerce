<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoSettings;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SeoSettingsController extends Controller
{
    function index(){
        return view("admin.pages.seo.add");
    }
    function store(Request $request){
        $request->validate([
            'title' => "Required",
            'description' => "Required",
            'keyword' => "Required",
            'author' => "Required",
            'favicon' => "Required",
            'logo' => "Required",
        ]);
        $seo = new SeoSettings();
        if($request->favicon){
            $fav = $request->file("favicon");
            $favName = rand().".".$fav->getClientOriginalExtension();
            $location = public_path("uploads/siteimage/".$favName);
            Image::make($fav)->save($location);
            $seo->favicon = $favName;
        }
        if($request->logo){
            $logo = $request->file("logo");
            $logoName = rand().".".$logo->getClientOriginalExtension();
            $location = public_path("uploads/siteimage/".$logoName);
            Image::make($logo)->save($location);
            $seo->logo = $logoName;
        }
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->author = $request->author;
        $seo->keyword = $request->keyword;
        $seo->save();
        return back()->with("successmessage","SEO Created Successfully");
    }
}
