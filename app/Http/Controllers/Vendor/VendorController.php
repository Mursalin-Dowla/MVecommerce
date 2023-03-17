<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Image;

class VendorController extends Controller
{

    public function dashboard(){
        return view('vendor.dashboard');
   }
   public function login(){
        return view('vendor.login');
   }
   public function registration(){
        return view('vendor.registration');
   }
   public function profile(){
     $vendorData = User::find(Auth::user()->id);
     return view('vendor.pages.profile',compact('vendorData'));
   }
   public function changepassword(){
     return view('vendor.pages.changepassword');
   }
   public function updatepassword(Request $request){
     $request->validate([
          'old_password' => 'required',
          'new_password' => 'required',
          'confirm_new_password' => 'required|same:new_password',
     ]);
     $enteredOldPass = $request->old_password;
     $actualOldPass = Auth::user()->password;
     if(Hash::check($enteredOldPass,$actualOldPass)){
          $findVendor = User::find(Auth::user()->id);
          $findVendor->password = bcrypt($request->new_password);
          $findVendor->update();
          return redirect()->route('vendor.profile')->with('successmessage','Password Changed successfully'); 
     }
     else{
          return back()->with('errormessage','Password Change was Unsuccessful'); 
     }

   }

   public function updateprofile(Request $request){
     $findVendor = User::find(Auth::user()->id);
     if($request->pic){
          if(File::exists(public_path("backend/assets/vendor/".$findVendor->pic))){
               File::delete(public_path("backend/assets/vendor/".$findVendor->pic));
               $image = $request->file('pic');
               $customName = rand().".".$image->getClientOriginalExtension();
               $location = public_path("backend/assets/vendor/".$customName);
               Image::make($image)->resize(300, 200)->save($location);
               $findVendor->pic = $customName;
          }
          else{
               $image = $request->file('pic');
               $customName = rand().".".$image->getClientOriginalExtension();
               $location = public_path("backend/assets/vendor/".$customName);
               Image::make($image)->resize(300, 200)->save($location);
               $findVendor->pic = $customName;
          }
     }
     $findVendor->email = $request->email;
     $findVendor->username = $request->username;
     $findVendor->name = $request->name;
     $findVendor->phone = $request->phone;
     $findVendor->address = $request->address;
     $findVendor->update();
     return redirect()->route('vendor.profile')->with('successmessage','Vendor Profile Updated successfully'); 
   }
}
