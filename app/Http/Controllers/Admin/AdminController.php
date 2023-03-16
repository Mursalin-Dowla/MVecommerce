<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function dashboard(){
        return view('admin.dashboard');
   }
   public function login(){
        return view('admin.login');
   }
   public function registration(){
        return view('admin.registration');
   }
   public function profile(){
     $adminData = User::find(Auth::user()->id);
     return view('admin.pages.profile',compact('adminData'));
   }
   public function changepassword(){
     return view('admin.pages.changepassword');
   }
   public function updateprofile(Request $request){
     $findUser = User::find(Auth::user()->id);
     $findUser->name = $request->name;
     $findUser->email = $request->email;
     $findUser->phone = $request->phone;
     $findUser->address = $request->address;
     $findUser->update();
     return redirect()->route('admin.profile')->with('successmessage','Profile Updated successfully'); 
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
          return redirect()->route('admin.profile')->with('successmessage','Password Changed successfully'); 
     }
     else{
          return back()->with('errormessage','Password Change was Unsuccessful'); 
     }

   }
}
