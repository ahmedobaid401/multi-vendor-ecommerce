<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Section;
 
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function index(){
                    $adminLogin=Auth::guard('admin')->user();
                    $adminType=$adminLogin->type;
                    if($adminType=="vendor"){
                         if($adminLogin->status==0){
                          return redirect('apdate-vendor-details/personal')->with("error_message","your vendor account is not approved yet");
                         }
                    }

        $products=Product::with("section:id,name","category:id,category_name","vendor:id,name");
        if($adminType=="vendor"){
          $products=$products->where('vendor_id',$adminLogin->id);
        }
        $products=$products->get()->toArray();
         
         // dd($products);
        
        
        return view("admin.products.index",compact("products"));

    }/////// end idex 
   

/////////////////////////// create product //////////////////////
public function create(){
      
       $sections=Section::with("categories")->get()->toArray();  
        
       $brands=Brand::all()->toArray();
return view("admin.products.add",compact("sections","brands"));
}////// end create


///////////////////////  store product  //////////////////////
public function store(Request $request){
$data=$request->all();
$Product= new Product; 
if($request->hasFile("product_image")){
  $file=$request->file("image");
  $image_extension=$file->getClientOriginalExtension();
  $image_name=$file->getClientOriginalName().rand(100,119999).".".$image_extension;
  $path_image=public_path()."/uploaded/front/images/product_images/";
  Image::make($file)->resize(1000,1000)->save($path_image."larg/".$image_name);
  Image::make($file)->resize(500,500)->save($path_image."medium/".$image_name);
  Image::make($file)->resize(250,250)->save($path_image."small/".$image_name);
  $Product->product_image=$image_name ; 
}
if($request->hasFile("product_video")){
  $file=$request->file("product_video");
  $video_extension=$file->getClientOriginalExtension();
  $video_name=$file->getClientOriginalName().rand(100,119999).".".$video_extension;
  $path_video=public_path()."/uploaded/front/video/product_video/";
  $file->move($path_video,$video_name);
  $Product->product_video= $video_name ;
} 
  $section_id=Category::where("id",$data["category_id"])->first()->section_id;
  $admin_type=Auth::guard("admin")->user()->type; 
  $vendor_id=Auth::guard("admin")->user()->vendor_id; 
   if($admin_type=="vendor"){
    $Product->vendor_id=$vendor_id; 
   }else{
    $Product->vendor_id= 0 ; 

   }
   
  //// store filter column
 if(isset($data['filters'])){ 
   $filters= $data['filters'];
  
    foreach($filters as $filter=>$values ){
          foreach($values as $value){ 
             $Product->{$filter}=$value;
          }
    }
 }

   $Product->product_name=$data['product_name'] ; 
   $Product->section_id=$section_id ; 
   $Product->admin_type=$admin_type ;  
   $Product->category_id=$data['category_id'] ; 
   $Product->brand_id=$data['brand_id'] ; 
   $Product->status= 1 ; 
   $Product->product_color=$data['product_color'] ; 
   $Product->product_discount=$data['product_discount'] ; 
   $Product->product_code=$data['product_code'] ; 
   $Product->product_weight=$data['product_weight'] ; 
   $Product->product_price=$data['product_price'] ;      
   $Product->description=$data['description'] ; 
   $Product->is_featured=$data['is_featured'] ; 
   $Product->meta_description=$data['meta_description'] ; 
   $Product->meta_title=$data['meta_title'] ;   
   $Product->meta_keywords=$data['meta_keywords'] ; 
  $Product->save();       
  return redirect("/admin/products/index")->with("success","Product has been added successfully");
                                

    }///// end add-edit Product

///////////////////////  edit product  //////////////////////
public function edit(Request $request,$id){

  $product=Product::where("id",$id)->first()->toArray();
  $sections=Section::with("categories")->get()->toArray();   
  $brands=Brand::all()->toArray();
  $filters=ProductsFilter::filter_available($product['category_id']);
  //dd($filters);
 
  return view("/admin/products/edit" , compact("product","sections","brands","filters"));
}//////////


//////////////////// update //////////////////////
  
public function update($id,Request $request){
  //dd($request->all());
  $data=$request->all();
  $product=Product::find($id);
   
  /////////// image upload
if($request->hasFile("product_image")){
  $file=$request->file("product_image");
  $image_extension=$file->getClientOriginalExtension();
  $image_name=$file->getClientOriginalName().rand(100,119999).".".$image_extension;
  $path_image=public_path()."/uploaded/front/images/product_images/";
  Image::make($file)->resize(1000,1000)->save($path_image."larg/".$image_name);
  Image::make($file)->resize(500,500)->save($path_image."medium/".$image_name);
  Image::make($file)->resize(250,250)->save($path_image."small/".$image_name);
  $product->product_image=$image_name ; 

} 
    
 ////////// upload video 
if($request->hasFile("product_video")){
  $file=$request->file("product_video");
  $video_extension=$file->getClientOriginalExtension();
  $video_name=$file->getClientOriginalName().rand(100,119999).".".$video_extension;
  $path_video=public_path()."/uploaded/front/video/product_video/";
  $file->move($path_video,$video_name);
  $product->product_video= $video_name ;
}   
    
 
$admin_type=Auth::guard("admin")->user()->type; 
$vendor_id=Auth::guard("admin")->user()->vendor_id; 
 if($admin_type=="vendor"){
  $product->vendor_id=$vendor_id; 
 } 

 //// store filter column
 if(isset($data['filters'])){ 
  $filters= $data['filters'];
 
   foreach($filters as $filter=>$values ){
         foreach($values as $value){ 
            $product->{$filter}=$value;
         }
   }
}
 
$section_id=Category::where("id",$data["category_id"])->first()->section_id;
$product->product_name=$data['product_name'] ; 
$product->section_id=$section_id ; 
$product->admin_type=$admin_type ; 
 
$product->category_id=$data['category_id'] ; 
$product->brand_id=$data['brand_id'] ; 
$product->status= 1 ; 
$product->product_color=$data['product_color'] ; 
$product->product_discount=$data['product_discount'] ; 
$product->product_code=$data['product_code'] ; 
$product->product_weight=$data['product_weight'] ; 
$product->product_price=$data['product_price'] ;      
$product->description=$data['description'] ; 
$product->description=$data['description'] ; 
$product->is_featured=$data['is_featured'] ; 
$product->meta_description=$data['meta_description'] ; 
$product->meta_title=$data['meta_title'] ;   
$product->meta_keywords=$data['meta_keywords'] ; 
$product->save();       
   
    return redirect("/admin/products/index")->with("success","Product has been updated successfully");
                                  
  
      }///// end edit Product


/*
    /////////////////////////////////////// append products////////////////////////////////////
    public function appendproducts(Request $request){
      
      if($request->ajax()){
       
      $data=$request->all();
    
      $products=Product::with("subProduct")->where("section_id", $data['section_id'])->where("parent_id",0)->get()->toArray() ;
      
      //dd( $products);
      return view("admin.products.append_products",compact("products"));
    
      }


    }///end append products

*/

    //////////////////////// add atributes/////////////////////////

    public function addEditAttributes(Request $request,$id){
      $product=Product::where("id",$id)->select("id","product_name","product_code","product_price","product_color")->with("attributes")->first()->toArray();
      //dd($product);
       if($request->isMethod("post")){
        
        $data=$request->all();
        //dd()
        foreach($data["sku"] as $key=>$value){
          ///// sku duplicate check
          $exist_sku=ProductAttribute::where("sku",$value)->count();
         if($exist_sku>0){
            return redirect()->back()->with("error_message","sku already existed ");
          }

        ///// size duplicate check
          $exist_size=ProductAttribute::where("product_id",$id)->where("size",$data["size"][$key])->count();
          if($exist_size>0){
            return redirect()->back()->with("error_message","size-color already existed ");
          }

             $attribute= new ProductAttribute;
             $attribute->product_id=$id;
             $attribute->sku=$value;
             $attribute->size=$data["size"][$key];
             $attribute->price=$data["price"][$key];
             $attribute->stock=$data["stock"][$key];
             
             $attribute->status= 1;

             $attribute->save();
             
         }

           return redirect()->back()->with("success","attribute has been added successfully");
       }
    
    return view("admin.attributes.add-edit-attributes",compact("product"));


    }///// end function 


    ////////////////// edit attribute/////////////////
    public function editAttributes(Request $request,$id){
           $data=$request->all();
          // dd($data);

           foreach($data["attribute_id"] as $key=>$value){
                  $attribute=ProductAttribute::find($value);
                  $attribute->price=$data["price"][$key];
                  $attribute->stock=$data["stock"][$key];
                  $attribute->save();

           }

           return redirect()->back()->with("success","attribute has been updated successfully");   

    }//// end function



// add colors
public function addAttributeColor(Request $request,$id){
  $productAttribute=ProductAttribute::where("id",$id)->select("id","size","product_id")->first()->toArray();
 // dd($productAttribute);
   if($request->isMethod("post")){
    
    $data=$request->all();
    //dd($data);
    foreach($data["color"] as $key=>$value){
      ///// color-size duplicate check
      $exist_size_color =DB::table("Product_attribute_color")->where("size",$value)->where("size",$data['size'])->count();
     if($exist_size_color>0){
        return redirect()->back()->with("error_message","size-color already existed ");
      }

         DB::table('Product_attribute_color')->insert([
          "product_attribute_id"=>$id ,
          "product_id"=>$data['product_id'],
          "size"=>$data['size'],
          "color"=>$value,
          "stock"=>$data['stock'][$key],
         ]);
         
          
         
     }

       return redirect()->back()->with("success","colors has been added successfully");
   }

return view("admin.attributes.add-color",compact("productAttribute"));


}///// end function 








    ///////////////////// add multiple images //////////////
    public function addImages(Request $request,$id){

    if($request->isMethod("post")){
          $data=$request->all();
      $img_files=$request->file("images");
      //dd($data);
      $img_files['image_primary']=$request->file('image_primary');
     // dd($img_files);
       foreach($img_files as $key=>$file){
      //  dd($file); 
        
          $image_extension=$file->getClientOriginalExtension();
          $image_name=$file->getClientOriginalName().rand(100,119999).".".$image_extension;
          $path_image=public_path()."/uploaded/front/images/product_images/";
          Image::make($file)->resize(1000,1000)->save($path_image."/".$image_name);
         // Image::make($file)->resize(500,500)->save($path_image."medium/".$image_name);
        //  Image::make($file)->resize(250,250)->save($path_image."small/".$image_name);
          $image= new ProductImage;

          if($key=="image_primary"){

            $image->is_orginal_image="yes" ; 
          }else{
            $image->is_orginal_image="no" ; 

          } 

          $image->product_id=$id;
          $image->image=$image_name ; 
         
          $image->color=$data['color']; 
          $image->status= 1;
          $image->save();      

          }

              return redirect()->back()->with("success","image has been updated successfully"); 


    }

      $product=Product::where("id",$id)->select("id","product_name","product_code","product_price","product_color")
      ->with("images")->first()->toArray();
      return view("admin.images.add-images",compact("product"));

     


    }//// end function


////////// delete image /////////////
public function imageDelete($id){

$image=ProductImage::select("id","image")->where("id",$id)->first();
//dd($image);
$image_path="uploaded/front/images/product_images/";
if(file_exists($image_path."small/".$image->image)){
   unlink($image_path."small/".$image->image);
}
if(file_exists($image_path."medium/".$image->image)){
  unlink($image_path."medium/".$image->image);
}
if(file_exists($image_path."larg/".$image->image)){
  unlink($image_path."larg/".$image->image);
}

$image->delete();
return redirect()->back()->with("success","image has been deleted successfully"); 

}/// end delete function




// products list
public function listing(Request $request){


  //$url=$request->route()->uri(); 
 $url= Route::getFacadeRoot()->current()->uri();
 $categorCount=Category::where("url",$url)->where("status",1)->count();
 if($categorCount > 0){
  $categoryDetails=Category::get_details($url);
  if($categoryDetails['parent_id']==0){
     
    $breadCrumb= "<li class='active'> <a href='".url($categoryDetails["url"])."' >".$categoryDetails["category_name"]." </a></li>";
                  
  }else{
   $mainCat= Category::select("category_name","url")->where("id",$categoryDetails['parent_id'])->first()->toArray();
    
    $breadCrumb= "<li> <a href='".url($mainCat["url"])."' >".$mainCat["category_name"]."</a></li>
                  <li class='active'> <a href='".url($categoryDetails["url"])."' >".$categoryDetails["category_name"]." </a></li>" ;        
  }
 
 
$categoryproducts=Product::with(["brand:id,name","attributes","images"=>function($builder){
$builder->select("id","product_id","image","color","is_orginal_image")->where("is_orginal_image","yes");
}])->whereIn("category_id",$categoryDetails['cat_ids'])->where("status",1);

 ;
 // ajax_filter_sort
if($request->ajax()){


  $data=$request->all();
   
 
// checking for filters

if(isset($data['filter'] ) && !empty($data['filter'] )){
  $filters_array=[];
  
 foreach($data["filter"] as $key=>$value){
 
  
    $filter= explode("-",$value);
    $filters_array[]=$filter;    
 }
 $categoryproducts->where(function($query) use($filters_array){
         foreach($filters_array as $filt){

          $query->orWhere($filt[0],$filt[1]);

         }
 });
}// end filter checking

// check size
if(isset($data["sizes"]) && !empty($data["sizes"])){
 
 $productId=ProductAttribute::select("product_id")->whereIn("size",$data["sizes"])->get()->pluck("product_id")->toArray();
  
 $categoryproducts->whereIn("id",$productId);


}
// end chek size 

// check colors
if(isset($data["colors"]) && !empty($data["colors"])){

  $productIds=DB::table("product_attribute_color")->select("product_id")->where("color",$data["colors"])->get()->pluck("product_id")->toArray();

  $categoryproducts->whereIn("id",$productIds);
 
 }
 // end chek colors 

// check brand
if(isset($data["brand"]) && !empty($data["brand"])){

  $productIds=Product::select("brand_id")->whereIn("brand_id",$data["brand"])->get()->pluck("id")->toArray();
  $categoryproducts->whereIn("id",$productIds);
 }
 // end chek brand 

 // check price
 if(isset($data["price"]) && !empty($data["price"])){
  $productId=[];

 foreach($data["price"] as $key=>$price){
     $priceArr=explode("-",$price);
     $productId[]=Product::select("id")->whereBetween("product_price",[$priceArr[0],$priceArr[1]])->get()->pluck("id")->toArray();
 }

 $productId=call_user_func_array("array_merge",$productId);
  ;
   $categoryproducts->whereIn("id",$productId);
   
  
  }
  //// end check price

/// check sort
   $_GET['sort']=$data['sort'];
   
if(isset($_GET['sort']) && !empty($_GET['sort']) ){

    if($_GET['sort']=="product_latest"){
            $categoryproducts->orderBy("id","Desc"); 
    }elseif($_GET['sort']=="price_lowest"){

         $categoryproducts->orderBy("product_price","Desc"); 
    }elseif($_GET['sort']=="price_highest"){

      $categoryproducts->orderBy("product_price","Asc"); 
   }elseif($_GET['sort']=="name_a_z"){

    $categoryproducts->orderBy("product_name","Asc"); 
  }elseif($_GET['sort']=="name_z_a"){

    $categoryproducts->orderBy("product_name","Desc"); 
  }
  $categoryproducts=$categoryproducts->paginate(8);
}// end if isset
 
return view("front.products.ajax_products_filter",compact("categoryproducts","categoryDetails","url"));
 }// end if ajax

$categoryproducts =$categoryproducts->paginate(8);
 
$sections=Section::sections();
//dd($categoryproducts);
   return view("front.products.List",compact("sections","categoryproducts","categoryDetails","breadCrumb","url"));
 }else{
  abort(404);

 }/// end categorycount > 0

}// end listing function 




///// ======== append filters ==============///
public function append_filters(Request $request){

  if($request->ajax()){
    $data=$request->all();
    $category_id=$data["category_id"];
    $filters_available= ProductsFilter::filter_available($category_id); 
    //return view("admin.products.append_filters",compact("filters_available"));
     return response()->json([
            "view"=>(String)View::make("admin.products.append_filters")->with(compact("filters_available"))
     ]);
  }
}//  end append_filters



// product details page
public function product_details(Request $request,$id ) {

    $data=$request->query();
    $size=$data['size'];
    $color=$data['color'];
    $stock=$data['stock'];
    $price=$data['price'];
  $product=Product::with(["section","category","brand","images","vendor","attributes"=>function($query){
         $query->where("stock",">",0)->where("status",1);
  }])->find($id)->toArray();

  //dd($product);
   
$vendor=Admin::with("vendor_personal","vendor_business","vendor_bank")->where("id",$product["vendor_id"])->first()->toArray();
  $sections=Section::sections();
  $categoryDetails=Category::get_details($product['category']['url']);
  
  return view("front.products.product_details",compact("vendor","product","sections","categoryDetails","size","color","stock","price"));
}

// get price attribute by ajax
public function get_price_attribute(Request $request){
  if($request->ajax()){
    $data=$request->all();
   // dd($data);
    $product_id=$data['product_id'];
    $size=$data['size'];
    $color=$data['color'];
    $price_arr=Product::getDiscountPrice($product_id,$size);
    $product_attributes=ProductAttribute::where("product_id",$product_id)->get()->toArray();
    // check the color-size
    $product_size_color=DB::table("product_attribute_color")->where("product_id",$product_id)
    ->where("color",$color)->where("size",$size)->first();
    if($product_size_color){
      $stock=$product_size_color->stock;
    }else{
      $stock=0;
    }

    $discount_price=$price_arr["discount_price"];
    
    $attribute_price=$price_arr["attribute_price"];
     
    return response()->json([
      "discount_price"=> $discount_price,
      "attribute_price"=>$attribute_price,
      "product_attributes"=>$product_attributes,
      "stock"=>$stock

]);

  }

}// end get price attribute

// get price attribute by ajax
public function get_color_product(Request $request){
  if($request->ajax()){
    $data=$request->all();
   // dd($data);
    $color=$data['color'];
    $size=$data['size'];
    $product_id=$data['product_id'];
    
   
    $product_attribute_color=DB::table("product_attribute_color")->where("product_id",$product_id)
    ->where("color",$color)->where("size",$size)->first();
    if($product_attribute_color){
      $stock=$product_attribute_color->stock;
    }else{
      $stock=0;
    }  
    return response()->json([$stock]);

  }

}// end get price attribute








 
}// end class
 