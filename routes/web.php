<?php
  
use App\sms\SmsSend;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;
use App\Models\DeliveryAddress;
 
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\front\CartController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\front\FrontController;
use App\Http\Controllers\admin\FilterController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\front\PaypalController;
use App\Http\Controllers\front\RatingController;
use App\Http\Controllers\front\VendorController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\front\currencyConverter;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\front\currencyController;
use App\Http\Controllers\admin\PaymentmethodsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//dd(Cache::get("caheRate"));
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

Route::middleware("guest:admin")->prefix("admin")->match(['get','post'],'/login', [AdminController::class, 'login'])->name('admin.login');

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
Route::match(["get","post"],"/product_attribute/{attribute_id}/add-color",[ProductController::class,"addAttributeColor"]); 
 



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
 
// payment methods
 Route::resource("payment-methods",PaymentmethodsController::class);


// role and abilities
Route::get("roles/index",[RoleController::class,"index"]);
Route::get("role/create",[RoleController::class,"create"]); 
Route::post("role/store",[RoleController::class,"store"]); 
Route::get("role/edit/{id}",[RoleController::class,"edit"]); 
Route::post("role/update/{role}",[RoleController::class,"update"]); 
Route::get("role/delete/{id}",[RoleController::class,"delete"]);
 });
 


 ///// end admin 





 /////////////    frontend    ////////////

 Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect','localizationRedirect',  'localeViewPath']
], 
function()
 {
    
Route::get("/",[FrontController::class,"index"]);

 $categories=Category::select("url")->where("status",1)->get()->pluck("url")->toArray();
 foreach($categories as $key=>$url){
   Route::match(["post","get"],"/".$url ,[ProductController::class,"listing"]);
     
 }

 
   

// vendors

Route::get("/vendor/login-register",[VendorController::class,"login_register"]);
Route::post("/vendor/register",[VendorController::class,"register"]);

// confirm vendor account
Route::get("/vendor/confirm/{email}",[VendorController::class,"confirm_vendor"]);

// product detail page
Route::post("/product/get_price_attribute",[ProductController::class,"get_price_attribute"]);
Route::get("/product/{id}",[ProductController::class,"product_details"]);

Route::post("/product/get_color_product",[ProductController::class,"get_color_product"]);


// cart module

Route::post("/cart/add",[CartController::class,"addTocart"]);
Route::get("/cart/show",[CartController::class,"cartShow"]);
Route::post("/cart/update",[CartController::class,"cartUpdate"]);
Route::post("/cart/delete",[CartController::class,"cartDelete"]);
Route::post("/cart/update-total",[CartController::class,"updateTotal"]);

// checkout 
Route::middleware("auth")->group(function () {
Route::match(["get","post"],"cart/checkout",[CartController::class,"checkout"]);
Route::any("payment/{slug}/return",[CartController::class,"callback"])->name("payment.return");
Route::any("payment/{slug}/cancel",[CartController::class,"cancel"])->name("payment.cancel");
Route::post("cart/check/address",function(){
    $addresses=DeliveryAddress::deliveryAddresses();
    
    if($addresses){

        return response()->json(['has_address' => true]);
    } else {
        return response()->json(['has_address' => false]);
    }

 });
});

// paypal
//Route::get("/paypal",[PaypalController::class,"payPal"]);
Route::any("payment/cancel",[PaypalController::class,"cancel"])->name("payment.cancel");
Route::any("payment/return",[PaypalController::class,"return"])->name("payment.return");

// rating
Route::post("add-rating",function(Request $request){
  //dd($request->all());
});

//user registering prosess 
 
Route::get("user/register-login",[UserController::class,"register_login"])->name("login");
Route::post("user/store",[UserController::class,"store"]);
Route::post("user/login",[UserController::class,"userLogin"])->name("user.login");
Route::get("user/confirm/{code}",[UserController::class,"confirmAccount"]);

// social login 
Route::get("auth/{driver}/redirect",[UserController::class,"redirect"]);
Route::get("auth/{driver}/callback",[UserController::class,"callback"]);


//////////////////
Route::middleware("auth")->group(function () {
Route::get("user/account/{id}",[UserController::class,"userAccount"])->name("userAccount");
Route::get("user/account-edit",[UserController::class,"userAccountEdit"])->name("userAccountEdit");
Route::post("user/account-update",[UserController::class,"userAccountUpdate"]);
Route::get("user/delivery-address",[UserController::class,"DeliveryAddressForm"]);
Route::post("user/delivery-address/store",[UserController::class,"DeliveryAddressStore"]);

});

Route::get("user/forget-password",[UserController::class,"forgetPassword"]);
Route::post("user/new-password",[UserController::class,"newPassword"]);
Route::post("user/put-new-password",[UserController::class,"putNewPassword"]);
Route::get("user/new-password-form/{code}",[UserController::class,"NewPasswordForm"]);
 

// currency converter
Route::get("currencyConverter/{currency_to}",[currencyController::class,"currencyConverter"]);

//// rating
Route::middleware("auth")->group(function(){

Route::post("product/rating/store",[RatingController::class,"store"]);
Route::get("product/rating/read/{id}",[RatingController::class,"getRatings"]);

});
 


});


