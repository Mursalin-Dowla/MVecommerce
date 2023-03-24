<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
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

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.pages.brand.edit',compact('brand'));
    }


    public function update(Request $request, $id)
    {
        $findBrand = Brand::find($id);
        if($request->brand_image){
            if(File::exists(public_path("uploads/brand/".$findBrand->brand_image))){
                File::delete(public_path("uploads/brand/".$findBrand->brand_image));
                $image = $request->file('brand_image');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path("uploads/brand/".$customName);
                Image::make($image)->resize(120, 120)->save($location);
                $findBrand->brand_image = $customName;
            }
            else{
                $image = $request->file('brand_image');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path("uploads/brand/".$customName);
                Image::make($image)->resize(120, 120)->save($location);
                $findBrand->brand_image = $customName;
            }
        }
        $findBrand->brand_name = $request->brand_name;
        $findBrand->brand_slug = Str::slug($request->brand_name);
        $findBrand->update();
        return redirect()->route('show.brand')->with('successmessage','Brand Updated successfully'); 
    }

    public function destroy($id)
    {
        $findBrand = Brand::find($id);
        if(File::exists(public_path("uploads/brand/".$findBrand->brand_image))){
            File::delete(public_path("uploads/brand/".$findBrand->brand_image));
        }
        $findBrand->delete();
        return back()->with('successmessage','Brand Deleted successfully'); 
    }
}
