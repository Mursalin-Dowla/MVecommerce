<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ApiTest;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    function index(){
        return view('testapi');
    }
    function store(Request $request){
        $api = new ApiTest;
        $api->title = $request->title;
        $api->description = $request->description;
        $api->price = $request->title;
        $api->rating = $request->rating;
        $api->thumbnail = $request->thumbnail;
        $api->save();
        return response()->json([
            "msg" => "Success"
        ]);
    }
    function senddata(){
        $category = Category::all();
        if($category){
            return response()->json([
                "code" => "101",
                "data" => $category    
            ]);
        }
        else{
            return response()->json([
                "code" => "404",                
            ]);
        }
    }
}
