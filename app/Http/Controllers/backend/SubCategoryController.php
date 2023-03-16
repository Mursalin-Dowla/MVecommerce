<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function index()
    {
        Return view('admin.pages.subcategory.add');
    }

    public function store(Request $request)
    {
        $subcategory = new SubCategory;        
        $subcategory->subcat_name = $request->subcat_name;
        $subcategory->subcat_slug = Str::slug($request->subcat_name);
        $subcategory->save();
        return back()->with('successmessage','Sub-Category Added Successfully');
    }

    public function show()
    {
        $subcategories = SubCategory::all();
        
        return view('admin.pages.category.manage', compact('subcategories'));
    }
}
