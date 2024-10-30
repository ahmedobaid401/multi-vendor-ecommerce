<?php

namespace App\Http\Controllers\front;

use App\Models\Admin;
use App\Models\Vendor;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
//use Validator;
class VendorController extends Controller
{
    public function login_register(){
        $sections=Section::sections();

       return view("front.vendors.login-register",compact("sections"));
    }


// register
    public function register(Request $request){
             if($request->isMethod("post")){
               $data=$request->all();
               //dd($data);
               $rule=[
                "name"=>"required",
                "email"=>"required|email|unique:admins|unique:vendors",
                "mobile"=>"required|unique:admins|unique:vendors",
                "password"=>"required",
                "accept"=>"required",
               ];

               $messages=[
                "name.required"=>"name is required",
                "email.required"=>"email is required",
                "email.unique"=>"email has already existed",
                "accept.required"=>"eccept is required",
                
               ];

              $validator= Validator::make($data,$rule,$messages);
            if($validator->fails()){
               return redirect()->back()->withErrors($validator);
            }
           
            DB::beginTransaction();

           // insert vendor
           $vendor= new Vendor;
           $vendor->name=$data['name'];
           $vendor->email=$data['email'];
           $vendor->mobile=$data['mobile'];
           $vendor->status= 0;
           $vendor->password= bcrypt($data['password']);
           

           //  set default timezone
           date_default_timezone_set("Asia/kolkata");
           $vendor->created_at=date("Y-m-d H:i:s");
           $vendor->updated_at=date("Y-m-d H:i:s");
           $vendor->save();


          // insert vendor details in admin table

          $vendor_id= DB::getPdo()->lastInsertId();

          $admin = new Admin;
          $admin->name=$data['name']; 
          $admin->vendor_id= $vendor_id; 
          $admin->type="vendor"; 
          $admin->mobile=$data['mobile']; 
          $admin->email=$data['email']; 
          $admin->password=bcrypt($data['name']); 
          $admin->status= 0;
          
          //  set default timezone
          date_default_timezone_set("Asia/kolkata");
          $admin->created_at=date("Y-m-d H:i:s");
          $admin->updated_at=date("Y-m-d H:i:s");
          $admin->save() ; 

          // send email confirm to vendor email
          
          $email=$data['email'];
          
          $messageData=[
            "name"=>$data['name'],
            "email"=>$email,
            "code"=>base64_encode($email),
          ];

//dd($messageData);
          Mail::send("emails.vendor_confirmation",$messageData,function($message) use($email){
            //dd($message);
            $message->to($email)->subject("confirm your vendor Account.");
          });
          
          DB::commit();

        $massage="Thanks for registering as vendor. please confirm your email to activate your account .";
          return redirect()->back()->with("success_message",$massage);

             }
            
    }// end register 


// confirm account
public function confirm_vendor($email){
  $email=base64_decode($email);
  $vendor=Vendor::where("email",$email)->count();
  if($vendor >0){
    $vendorDetails=Vendor::where("email",$email)->first();
    if($vendorDetails->confirm == "yes"){

      $message="your vendor account is already confirmed . you can login";
    }else{

      Admin::where("email",$email)->update(["confirm"=>"yes"]);
      Vendor::where("email",$email)->update(["confirm"=>"yes"]);

    // send register email
    $email=$email;
    $messageData=[
      "name"=>$vendorDetails->name,
      "email"=>$email,
      "mobile"=>$vendorDetails->mobile,
    ];

    Mail::send("emails.vendor_confirmed",$messageData,function($message) use($email){
      $message->to($email)->subject("your vendor Account.");
    });

    // redirect to login/register page with success message
    $message="your vendor email account is confirmed . you can login and add your
    personal, business and bank details to activate your vendor account";

    return redirect('vendor/login-register')->with("success_message",$message);
    }
  }else{
    abort(404);
  }

}

}
