<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    public function index()
    {
        Return view('admin.pages.brand.add');
    }

    public function store(Request $request)
    {
        $brand = new Brand;        
        if($request->brand_image){
            $image = $request->file('brand_image');
            $customName = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/brand/'.$customName);
            Image::make($image)->resize(120,120)->save($location);
            $brand->brand_image = $customName;
        }
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = Str::slug($request->brand_name);
        $brand->save();
        return back()->with('successmessage','Brand Added Successfully');
    }

    public function show()
    {
        $brands = Brand::all();
        
        return view('admin.pages.brand.manage', compact('brands'));
    }
}
