<?php

use App\Models\Category;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\FilterController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\front\VendorController;

//require  __DIR__.'/auth.php';
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware("guest")->prefix("admin")->match(['get','post'],'/login', [AdminController::class, 'login'])->name('admin.login');

Route::middleware("admin")->prefix("admin")->group(function () {
     
     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
     Route::get('admin-update-password', [AdminController::class, 'updatepassword']);
     Route::post("/update-status", [AdminController::class,'updateStatus']);
     Route::post('/check-current-password', [AdminController::class,'checkCurrentPassword']);
     Route::get('/admin-update-details', [AdminController::class, 'updatdetails']);    
     Route::match(['get','post'],'update-vendor-details/{slug}', [AdminController::class, 'updateVendorDetails']);
     Route::get('admins/{type?}',[AdminController::class, 'admins']);  
     Route::get('admins/view/{id}',[AdminController::class, 'viewVendorDetails']);  
     Route::match(['get','post'],'admins/edit/{id}',[AdminController::class, 'adminEdit']);  
     Route::delete('admins/delete/{id}',[AdminController::class, 'adminDelete']);      
     Route::post('/store/{admin}', [AuthenticatedSessionController::class, 'store'])->name('admin.store');
     Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

////////////////////////////////////////////// sections managment /////////////////////////////////////////
Route::get("sections/index",[SectionController::class,"index"]);
Route::get("section/view",[SectionController::class,"view"]);
Route::match(["get","post"],"section/add-edit/{id?}",[SectionController::class,"addEdit"]);
Route::get("section/update",[SectionController::class,"update"]);
Route::get("section/delete/{id}",[SectionController::class,"delete"]);

/////////////////////////////////////////// categories managment /////////////////////////////////////////
Route::get("categories/index",[CategoryController::class,"index"]);
Route::post("categories/update-status",[CategoryController::class,"updateStatus"]);
Route::match(["get","post"],"categories/add-edit/{id?}",[CategoryController::class,"addEdit"]);
Route::post("/append_categories",[CategoryController::class,"appendCategories"]);

// //////////////////////////////////////////// brands managment /////////////////////////////////////////
Route::get("brands/index",[BrandController::class,"index"]);
Route::match(["get","post"],"brand/add-edit/{id?}",[BrandController::class,"addEdit"]); 
Route::get("brand/delete/{id}",[BrandController::class,"delete"]);

/////////////////////////// products managment//////////////////////////////////////
Route::get("products/index",[ProductController::class,"index"]); 
Route::get("products/add",[ProductController::class,"create"]); 
Route::post("products/store",[ProductController::class,"store"]); 
Route::get("product/edit/{id}",[ProductController::class,"edit"]);
Route::post("product/update/{id}",[ProductController::class,"update"]); 
Route::get("product/delete/{id}",[ProductController::class,"delete"]);
Route::post("products/append_filters",[ProductController::class,"append_filters"]);


/////////////////////////////////// Atributes/////////////////////////////////
Route::match(["get","post"],"/add-edit-attributes/{id?}",[ProductController::class,"addEditAttributes"]); 
Route::post("/edit-attribute/{id?}",[ProductController::class,"editAttributes"]); 


////////////////////// images module////////////////////
Route::match(["get","post"],"/add-images/{id?}",[ProductController::class,"addImages"]); 
Route::get("image/delete/{id}",[ProductController::class,"imageDelete"]);

////////// slider //////////////////////////////////
Route::get("sliders/index",[SliderController::class,"index"]);
 Route::match(["get","post"],"/slider/add-edit/{id?}",[SliderController::class,"addEdit"]); 
Route::get("slider/delete/{id}",[SliderController::class,"delete"]);


/////////   filter    /////////////
Route::get("filters/index",[FilterController::class,"index"]);
Route::match(["get","post"],"/filters/add-edit/{id?}",[FilterController::class,"addEdit"]); 
Route::get("filters/delete/{id}",[FilterController::class,"delete"]);
Route::get("filters/values/",[FilterController::class,"filterValues"]);
Route::match(["get","post"],"/filters/add-edit/{id?}",[FilterController::class,"addEdit"]); 
Route::match(["get","post"],"/filters/add-edit-filterValue/{id?}",[FilterController::class,"addEditFilterValue"]); 
Route::get("filterValue/delete/{id}",[FilterController::class,"delete"]);



 });
 ///// end admin 


 /////////////      front end    ////////////

 Route::get("/",[FrontController::class,"index"]);

 $categories=Category::select("url")->where("status",1)->get()->pluck("url")->toArray();
 foreach($categories as $key=>$url){
    Route::match(["post","get"],"/".$url ,[ProductController::class,"listing"]);
 }

 

///// vendors

Route::get("/vendor/login-register",[VendorController::class,"login_register"]);
Route::post("/vendor/register",[VendorController::class,"register"]);

// confirm vendor account
Route::get("/vendor/confirm/{email}",[VendorController::class,"confirm_vendor"]);

 

