<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Return view('admin.pages.category.add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;        
        if($request->cat_image){
            $image = $request->file('cat_image');
            $customName = rand().'.'.$image->getClientOriginalExtension();
            $location = public_path('uploads/category/'.$customName);
            Image::make($image)->resize(120,120)->save($location);
            $category->cat_image = $customName;
        }
        $category->cat_name = $request->cat_name;
        $category->cat_slug = Str::slug($request->cat_name);
        $category->save();
        return back()->with('successmessage','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $categories = Category::all();
        
        return view('admin.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $findCategory = Category::find($id);
        if($request->cat_image){
            if(File::exists(public_path("uploads/category/".$findCategory->cat_image))){
                File::delete(public_path("uploads/category/".$findCategory->cat_image));
                $image = $request->file('cat_image');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path("uploads/category/".$customName);
                Image::make($image)->resize(120, 120)->save($location);
                $findCategory->cat_image = $customName;
            }
            else{
                $image = $request->file('cat_image');
                $customName = rand().".".$image->getClientOriginalExtension();
                $location = public_path("uploads/category/".$customName);
                Image::make($image)->resize(120, 120)->save($location);
                $findCategory->cat_image = $customName;
            }
        }
        $findCategory->cat_name = $request->cat_name;
        $findCategory->cat_slug = Str::slug($request->cat_name);
        $findCategory->update();
        return redirect()->route('show.category')->with('successmessage','Category Updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $findCategory = Category::find($id);
        if(File::exists(public_path("uploads/category/".$findCategory->cat_image))){
            File::delete(public_path("uploads/category/".$findCategory->cat_image));
        }
        $findCategory->delete();
        return back()->with('successmessage','Category Deleted successfully'); 
    }
}
