<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FrontendController extends Controller
{
    public function dashboard(){
        $userData = User::find(Auth::user()->id);
        return view('dashboard',compact('userData'));
    }
    function updateprofile(Request $request){
        $findUser = User::find(Auth::user()->id);
     if($request->pic){
          if(File::exists(public_path("backend/assets/user/".$findUser->pic))){
               File::delete(public_path("backend/assets/user/".$findUser->pic));
               $image = $request->file('pic');
               $customName = rand().".".$image->getClientOriginalExtension();
               $location = public_path("backend/assets/user/".$customName);
               Image::make($image)->resize(300, 200)->save($location);
               $findUser->pic = $customName;
          }
          else{
               $image = $request->file('pic');
               $customName = rand().".".$image->getClientOriginalExtension();
               $location = public_path("backend/assets/user/".$customName);
               Image::make($image)->resize(300, 200)->save($location);
               $findUser->pic = $customName;
          }
     }
     $findUser->email = $request->email;
     $findUser->username = $request->username;
     $findUser->name = $request->name;
     $findUser->phone = $request->phone;
     $findUser->address = $request->address;
     $findUser->update();
     return redirect()->route('dashboard')->with('successmessage','Profile Updated successfully'); 
    }
    function home(){
     $allProducts = Product::all();
     $FeaturedProducts = Product::where('featured','Featured')->get();
     $cats = Category::all();
     $vendors = User::where('role','vendor')->get();
     return view('welcome',compact('cats','allProducts','FeaturedProducts','vendors'));
    }
    static function gallery($id){
     return ProductGallery::where('product_id',$id)->get();
    }
}
