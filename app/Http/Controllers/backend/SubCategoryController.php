<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        $cats = Category::all();
        Return view('admin.pages.subcategory.add',compact('cats'));
    }

    public function store(Request $request)
    {
        $subcategory = new SubCategory;        
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->subcat_slug = Str::slug($request->subcat_name);
        $subcategory->save();
        return back()->with('successmessage','Sub-Category Added Successfully');
    }

    public function show()
    {
        $subcategories = SubCategory::all();
        
        return view('admin.pages.subcategory.manage', compact('subcategories'));
    }

    public function edit($id)
    {
        $cats = Category::all();
        $subcategory = SubCategory::find($id);
        return view('admin.pages.subcategory.edit',compact('subcategory','cats'));
    }
    public function update(Request $request, $id)
    {
        $findSubCategory = SubCategory::find($id);
        $findSubCategory->subcat_name = $request->subcat_name;
        $findSubCategory->subcat_slug = Str::slug($request->subcat_name);
        $findSubCategory->cat_id = $request->cat_id;
        $findSubCategory->update();
        return redirect()->route('show.subcategory')->with('successmessage','SubCategory Updated successfully'); 
    }
    public function destroy($id)
    {
        $findSubCategory = SubCategory::find($id);
        $findSubCategory->delete();
        return back()->with('successmessage','Sub-Category Deleted successfully'); 
    }
}
