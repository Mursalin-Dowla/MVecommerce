<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
          $findUser = User::find(Auth::user()->id);
          $findUser->password = bcrypt($request->new_password);
          $findUser->update();
          return redirect()->route('vendor.profile')->with('successmessage','Password Changed successfully'); 
     }
     else{
          return back()->with('errormessage','Password Change was Unsuccessful'); 
     }

   }
}
