<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function dashboard(){
        $userData = User::find(Auth::user()->id);
        return view('dashboard',compact('userData'));
    }
}
