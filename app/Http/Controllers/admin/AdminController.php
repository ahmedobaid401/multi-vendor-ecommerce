<?php

namespace App\Http\Controllers\admin;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\ProductsFilter;
use App\Models\ProductAttribute;
use App\Models\VendorsBankDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductsFiltersValue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\VendorsbusinessDetail;
use Illuminate\Database\Eloquent\Builder;
use Database\Seeders\productAttributeSeeder;

class AdminController extends Controller
{

    public function dashboard(Request $request){
       
        return view('admin.dashboard');
    }

   

    public function login(Request $request){
     
        if(!$request->ismethod('post')) {
           return view('admin.login');
       }
  
         $request->validate([
            'email' =>'required|email',
            'password' => 'required|min:8'
        ],[
            "email.required"=>"email is required",
            "email.email"=>"email must be valid",
            "password.required"=>"password is required",
        ]);

        if(Auth::guard('admin')->attempt(['email'=>$request->email ,'password'=>$request->password])){
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error','Invalid Credentials');
      
      
    }// end login 


///////////////////////////////// //// 
    public function logout(){   
        Auth::guard('admin')->logout();
        return redirect('admin/login') ;
    }// end logout
 

 //////////// update password ///////////////
    public function updatePassword(Request $request){

     $admin=Auth::guard('admin')->user();
        return view('admin.update-password',compact('admin'));
    }

/////////////////// update vendor details ///////////////////////
 public function updateVendorDetails($slug,Request $request){
       
    $country=config("countryTable");
   
     if($slug=='personal'){

       $vendor_personal=Vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first();
        if($request->ismethod('post')){
            $personal_details=[
               'name' => $request->name,
               'mobile' => $request->mobile,
                'email' => $request->email,
                'address' => $request->address,
                'city' => $request->city,
                'pincode' => $request->pincode,
                'country' => $request->country,
                'state' => $request->state,
            ];
   
            $vendor_personal->update($personal_details);
            return redirect()->back()->with('success','Personal Details Updated Successfully');
        }
      $vendor_personal->toArray();
       return view('admin.update-vendor-details',compact('slug','vendor_personal','country'));
 ////////////// business details
     }else if($slug=='business'){

        $vendor_business= VendorsbusinessDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first();

       if($request->ismethod('post')){
         
            $data_business=$request->except(["_token"]) ;
             
             $vendor_business->update($data_business);
            return redirect()->back()->with('success','business Details Updated Successfully');
        }
       $vendor_business=$vendor_business->toArray();
       //dd($vendor_business,$country);
        unset($vendor_business['created_at'],$vendor_business['updated_at'],$vendor_business['vendor_id'],$vendor_business['id']);
        return view('admin.update-vendor-details',compact('slug','vendor_business','country'));

     }else if($slug=='bank'){

        $vendor_bank=VendorsBankDetail::where('id',Auth::guard('admin')->user()->vendor_id)->first();
       if($request->ismethod('post')){

        $data_bank=$request->except(["_token","vendor_id","created_at","updated_at","id"]) ;
         $vendor_bank->update($data_bank);
        return redirect()->back()->with('message','Bank Details Updated Successfully');
       }
       
      $vendor_bank=$vendor_bank->toArray();
      unset($vendor_bank['created_at'],$vendor_bank['updated_at'],$vendor_bank['vendor_id'],$vendor_bank['id']);
        return view('admin.update-vendor-details',compact('slug','vendor_bank','country'));
     }
    }



    ///////// admins manage //////////////
    public function admins($type=null){        
        $admins=Admin::query();
        if($type!=='all'){
            $admins->where('type',$type)->get()->toArray(); 
        } 
                   
       $admins= $admins->get()->toArray();    
        return view('admin.admins.admins',compact('admins'));
    }
/////////////////////////////////////////////////////


///////////////////  admin view /////////////////////
public function viewVendorDetails($id){
   
$vendor_details= Admin::with('vendor_personal','vendor_business','vendor_bank')->where('id', $id)->first()->toArray(); 
    return view('admin.admins.vendor-view',compact('vendor_details'));
}
///////////////////////////////////////////////////////


///////////////////// edit admin /////////////////////
    public function adminEdit($id,Request $request ){
        $admin=Admin::find($id);
     //   dd($id);
        if($request->ismethod('post')){
           $data=$request->except(['_token']);
           // dd($data);
            $admin->update($data);
            return redirect()->back()->with('success','Admin Updated Successfully');
        }
         $admin=$admin->toArray();
        return view('admin.admins.edit-admin',compact('admin'));
    }

/////////////////// delete admin /////////////////////
    public function adminDelete($id){
        $admin=Admin::find($id);
        $admin->delete();
        return redirect()->back()->with('success','Admin Deleted Successfully');
    }
////////////////////////////////////////////


/////////////////////////////////////////////
public function  checkCurrentPassword(Request $request)
{
   
         if(Hash::check($request->current_password , Auth::guard('admin')->user()->password)){

                return  'true';
            }else{
                return 'false';
            }
}
///////////////////  update status for all modules        ///////////////////////////

public function  updateStatus(Request $request)
{
     if($request->ajax()){
    $data=$request->all();

    $class_name=ucfirst($data["object"]);
    $classWithNamespace="App\Models\\$class_name" ;
   $object= app($classWithNamespace)->findOrFail($data["id"]);
    if($data['current_status']=='Active')
    {
       $status=0;        
    }else{
       $status=1;     
    }

// send email to vendor
$email=$object->email;
   if($data['object']=="vendor"){
    $messageData=[
        "name"=>$object->name,
        "email"=>$email,
         
      ];

//dd($messageData);
      Mail::send("emails.vendor_approved",$messageData,function($message) use($email){
        //dd($message);
        $message->to($email)->subject(" your vendor Account is approved.");
      });

   }
    $object->status=$status;
    $object->save();
       return response()->json(["status"=>$status]) ;       
       }
  }

   /* 
   if($data["object"]=="admin"){
    $object=Admin::find($data['id']);
   }elseif($data["object"]=="section"){

    $object=Section::find($data['id']);

  }elseif($data["object"]=="brand"){

    $object=Brand::find($data['id']);

   }elseif($data["object"]=="category"){

    $object=Category::find($data['id']);

   }elseif($data["object"]=="product"){

    $object=Product::find($data['id']);

   }elseif($data["object"]=="ProductAttribute"){

    $object=ProductAttribute::find($data['id']);

   }elseif($data["object"]=="ProductImage"){

    $object=ProductImage::find($data['id']);
   }elseif($data["object"]=="slider"){
       //dd($data);
    $object=Slider::find($data['id']);
   }
     */   
    

}












 
