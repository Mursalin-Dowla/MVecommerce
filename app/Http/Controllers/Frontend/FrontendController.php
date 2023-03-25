<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\AddToCart;
use App\Models\SeoSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use League\CommonMark\Node\Block\Document;

class FrontendController extends Controller
{
    public function dashboard(){
        $userData = User::find(Auth::user()->id);
        $allProducts = Product::all();
     $FeaturedProducts = Product::where('featured','Featured')->get();
     $cats = Category::all();
     $seo = SeoSettings::first();
     $vendors = User::where('role','vendor')->get();
        return view('dashboard',compact('userData','cats','allProducts','FeaturedProducts','vendors','seo'));
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
     $seo = SeoSettings::first();
     $vendors = User::where('role','vendor')->get();
     return view('welcome',compact('cats','allProducts','FeaturedProducts','vendors','seo'));
    }
    static function gallery($id){
     return ProductGallery::where('product_id',$id)->get();
    }
    function addtocart($id){
     $user_id = Auth::user()->id;
     $product_info = Product::find($id);
     $addtocart = new AddToCart();
     $addtocart->user_id = $user_id;
     $addtocart->product_id = $product_info->id;
     $addtocart->product_name = $product_info->product_name;
     $addtocart->price = $product_info->selling_price;
     $addtocart->image = $product_info->image;
     $addtocart->qnt = 1;
     $addtocart->save();
     return response()->json([
          'msg' => "Product Added To cart"
     ]);

    }
    function showcart(){
     $user_id = Auth::user()->id;
     $cart = AddToCart::where('user_id',$user_id)->get();
     return response()->json([
          'data' => $cart
     ]);
    }
    function deleteItem($id){
     $findCart = AddToCart::find($id);
     $findCart->delete();
     return response()->json([
          'msg' => "Item Removed"
     ]);
    }
    function viewcart(){
     $user_id = Auth::user()->id;
     $allCarts = AddToCart::where('user_id',$user_id)->get();
     $FeaturedProducts = Product::where('featured','Featured')->get();
     $cats = Category::all();
     $vendors = User::where('role','vendor')->get();
     $carts = AddToCart::all();
     return view('viewcart',compact('carts','cats','allCarts','FeaturedProducts','vendors'));
    }
    function qntup($id){
          $findCart = AddToCart::find($id);
          $findCart->qnt++;
          $findCart->update();
          return response()->json([
               'msg' => 'Please Reload',              
          ]);
    }
    function qntdown($id){
     $findCart = AddToCart::find($id);
     $findCart->qnt--;
     $findCart->update();
     return response()->json([
          'msg' => 'Please Reload',              
     ]);
}
function deleteCartItem($id){
     $findCart = AddToCart::find($id);
     $findCart->delete();
     return back();
}
}
