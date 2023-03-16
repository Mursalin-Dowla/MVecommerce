<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [FrontendController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// For Admin Before Login
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::get('admin/registration',[AdminController::class,'registration'])->name('admin.registration');
// For Admin After Login
Route::middleware('auth','role:admin')->group(function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::get('admin/profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('admin/changepassword',[AdminController::class,'changepassword'])->name('admin.changepassword');
    Route::post('admin/updatepassword',[AdminController::class,'updatepassword'])->name('admin.updatepassword');
    Route::post('admin/updateprofile',[AdminController::class,'updateprofile'])->name('admin.updateprofile');
    // admin category
    Route::group(['prefix' => 'admin/category'], function(){
        Route::get('/add',[CategoryController::class,'index'])->name('add.category');
    });
});


// For Vendor Before Login
Route::get('vendor/login',[VendorController::class,'login'])->name('vendor.login');
// For Vendor After Login
Route::middleware('auth','role:vendor')->group(function(){
    Route::get('vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
    Route::get('vendor/profile',[VendorController::class,'profile'])->name('vendor.profile');
    Route::get('vendor/changepassword',[VendorController::class,'changepassword'])->name('vendor.changepassword');
    Route::post('vendor/updatepassword',[VendorController::class,'updatepassword'])->name('vendor.updatepassword');
});


// For User Before Login
Route::get('user/login',[]);
// For User After Login
// Route::middleware('auth')->group(function(){
//     Route::get('user/dashboard',[])->name('user.dashboard');
// });

require __DIR__.'/auth.php';
