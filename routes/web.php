<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SeoSettingsController;
use App\Http\Controllers\Frontend\ApiTestController;
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

Route::get('/', [FrontendController::class,'home']);
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
        Route::post('/store',[CategoryController::class,'store'])->name('store.category');
        Route::get('/show',[CategoryController::class,'show'])->name('show.category');
        Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit.category');
        Route::post('/update/{id}',[CategoryController::class,'update'])->name('update.category');
        Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete.category');
    });
    Route::group(['prefix' => 'admin/subcategory'], function(){
        Route::get('/add',[SubCategoryController::class,'index'])->name('add.subcategory');
        Route::post('/store',[SubCategoryController::class,'store'])->name('store.subcategory');
        Route::get('/show',[SubCategoryController::class,'show'])->name('show.subcategory');
        Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('edit.subcategory');
        Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('update.subcategory');
        Route::get('/delete/{id}',[SubCategoryController::class,'destroy'])->name('delete.subcategory');
    });
    Route::group(['prefix' => 'admin/brand'], function(){
        Route::get('/add',[BrandController::class,'index'])->name('add.brand');
        Route::post('/store',[BrandController::class,'store'])->name('store.brand');
        Route::get('/show',[BrandController::class,'show'])->name('show.brand');
        Route::get('/edit/{id}',[BrandController::class,'edit'])->name('edit.brand');
        Route::post('/update/{id}',[BrandController::class,'update'])->name('update.brand');
        Route::get('/delete/{id}',[BrandController::class,'destroy'])->name('delete.brand');
    });
    Route::group(['prefix' => 'admin/product'], function(){
        Route::get('/add',[ProductController::class,'index'])->name('add.product');
        Route::post('/store',[ProductController::class,'store'])->name('store.product');
        Route::get('/show',[ProductController::class,'show'])->name('show.product');
        Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit.product');
        Route::post('/update/{id}',[ProductController::class,'update'])->name('update.product');
        Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('delete.product');
    });
    Route::group(['prefix' => 'admin/seo'], function(){
        Route::get('/add',[SeoSettingsController::class,'index'])->name('add.seo');
        Route::post('/store',[SeoSettingsController::class,'store'])->name('store.seo');
        Route::get('/show',[SeoSettingsController::class,'show'])->name('show.seo');
        Route::get('/edit/{id}',[SeoSettingsController::class,'edit'])->name('edit.seo');
        Route::post('/update/{id}',[SeoSettingsController::class,'update'])->name('update.seo');
        Route::get('/delete/{id}',[SeoSettingsController::class,'destroy'])->name('delete.seo');
    });
});


// For Vendor Before Login
Route::get('vendor/login',[VendorController::class,'login'])->name('vendor.login');
Route::get('vendor/registration',[VendorController::class,'registration'])->name('vendor.registration');
// For Vendor After Login
Route::middleware('auth','role:vendor')->group(function(){
    Route::get('vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
    Route::get('vendor/profile',[VendorController::class,'profile'])->name('vendor.profile');
    Route::get('vendor/changepassword',[VendorController::class,'changepassword'])->name('vendor.changepassword');
    Route::post('vendor/updatepassword',[VendorController::class,'updatepassword'])->name('vendor.updatepassword');
    Route::post('vendor/updateprofile',[VendorController::class,'updateprofile'])->name('vendor.updateprofile');
});


// For User Before Login
Route::get('user/login',[]);
// For User After Login
Route::middleware('auth')->group(function(){
    Route::post('user/updateprofile',[FrontendController::class,'updateprofile'])->name('user.updateprofile');

    // For Cart
    Route::get('/addtocart/{id}',[FrontendController::class,'addtocart'])->name('addtocart');
    Route::get('/showcart',[FrontendController::class,'showcart'])->name('showcart');
    Route::get('/deleteItem/{id}',[FrontendController::class,'deleteItem'])->name('deleteItem');
    Route::get('/viewcart',[FrontendController::class,'viewcart'])->name('viewcart');
    Route::get('/qntup/{id}',[FrontendController::class,'qntup'])->name('qntup');
    Route::get('/qntdown/{id}',[FrontendController::class,'qntdown'])->name('qntdown');
    Route::get('/deleteCartItem/{id}',[FrontendController::class,'deleteCartItem'])->name('deleteCartItem');
});

// Api test

Route::get('/apitest',[ApiTestController::class, 'index']);
Route::post('/apitest/store',[ApiTestController::class, 'store']);

require __DIR__.'/auth.php';
