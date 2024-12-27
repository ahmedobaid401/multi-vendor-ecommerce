<?php

namespace App\Http\Controllers\front;

use App\sms;
use App\Models\Cart;
use App\Models\User;
use App\sms\SmsSend;
use App\Models\Section;
use App\Models\UserAddress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function register_login(){
        // the best solution is component
        $sections=Section::sections();
       
        return view("front.users.register_login",compact("sections"));
    }//end fun


// user store
   public function store(Request $request){
    if($request->ajax()){
      $data=$request->all();
      $formData=$data['formData'];
      parse_str($formData,$data_result);

      // validation
      $validator=Validator::make($data_result,[
        "email"=>"required|email|unique:users",
        "name"=>"required|string|max:100",
        
        "phone"=>"required|numeric|digits:10",
        "password"=>"required|min:6",
         
      ],[
        "email.unique"=>"email is already exists"
      ]);

      if($validator->passes()){
           $user=new User;
           $user->name=$data_result['name'];
           $user->email=$data_result['email'];
           $user->phone=$data_result['phone'];
           $user->password=bcrypt($data_result['password']);
           $user->status= 0;
           $user->save();
           
           // confirmation email
           $email=$data_result['email'];
           $messageData=["name"=>$data_result['name'],"email"=>$data_result['email'],"phone"=>$data_result['phone'],
           "code"=>base64_encode($data_result['email'])];
           Mail::send("emails.user.confirmation",$messageData,function($message)use($email){
            $message->to($email)->subject("please confirm youe email to activate your account");
           });
           $redirect=url("user/register-login");
           return response()->json(["type"=>"success","url"=> $redirect]);
           // send sms message
          $smsSend =new SmsSend;
          $smsSend->sendMessage($data_result['phone']);

        //   if(Auth::attempt(["email"=>$data_result['email'],"password"=>$data_result['password']])){
          //  $redirect=url("/");
          //  return response()->json(["type"=>"success","url"=> $redirect]);
          // }
            
      }else{
        return response()->json(["type"=>"error","errors"=>$validator->messages()]);
      }
     
        
        
        
    }
    }// end store

    
         
    
   // user login 
   public function userLogin(Request $request){
      if($request->ajax()){
          $data=$request->all();
          $formData=$data['formData'];
          parse_str($formData,$data_result);
         // dd($data_result['remember-me']);
    
          // validation
          $validator=Validator::make($data_result,[
            "email"=>"required|email|max:150",
            "password"=>"required|min:6",
             
          ]);
            
          if($validator->passes()){
               
               if(Auth::attempt(["email"=>$data_result['email'],"password"=>$data_result['password']])){

              // if user accoıunt not activated
               if(Auth::user()->status == 0){
                  Auth::logout();
                     return response()->json(["type"=>"inactive","message"=> "your account is not activated"]);
                 }


                // update cart-user-id
                if(!empty(Session::get("session_id"))){
                  $user_id=Auth::id();
                  $session_id=Session::get("session_id");
                  Cart::where("session_id",$session_id)->update(["user_id"=>$user_id]);
                }


                $redirect=url("/");
                return response()->json(["type"=>"success","url"=> $redirect]);
               }else{
                return response()->json(["type"=>"incorrect","message"=>"email or password not correct"]);

               }
                
          }else{
            return response()->json(["type"=>"error","errors"=>$validator->messages()]);
          }
                    
            
        }
        }// end user login



    // update account 
    public function userAccountUpdate(Request $request){
      $data=$request->all();
      //dd($data);
      $id=Auth::id();
      $validator=Validator::make($data,[
        "email"=>["required","email",Rule::unique("users")->ignore($id)],
        "name"=>"string|max:100",
        
        "phone"=>"required|numeric|digits:10",
        "pincode"=>"required|digits:6",
        "country_code"=>"required|max:2",
        "state"=>"required|string",
        "city"=>"required|string",
        "address"=>"required|string",
         
      ],[
        "email.unique"=>"email is already exists"
      ]);

      if($validator->passes()){

        $userAddress=new UserAddress ; 
        $userAddress->user_id= Auth::id();
        $userAddress->country=$data['country_code'];
        $userAddress->state=$data['state'];
        $userAddress->city=$data['city'];
        $userAddress->email=$data['email'];
        $userAddress->name=$data['name'];
        $userAddress->pincode=$data['pincode'];
        $userAddress->address=$data['address'];
        if( $userAddress->save()){
          if($request->ajax()){
            return response()->json(["success"=>"details account has inserted successfully"]);
  
          }
          return back()->with("success","details account has inserted successfully");
        }else{
          if($request->ajax()){
            return response()->json(["error"=>"insert prossess has failed"]);
  
          }
          return back()->with("error","  insert prossess has failed");
  
        }
      }else{
        if($request->ajax()){
            return response()->json(["error-validation","errors"=>$validator->messages()]);
        }else{
          return back()->withErrors($validator)->withInput();
        }

         
      }
      

      
     
      
    }// end fun


  // user logout
    public function logout(){
      Auth::logout();
      return redirect("/");
    }


 // user account
 public function userAccount($id){
  $id=Auth::id();
  if(!$id){
    return back();
  }
   
  $sections=[];
  $user=User::with("address")->where("id",$id)->first()->toArray();
  
  return view("front.users.my-account",compact("user","sections"));
}

// user account edit
public function userAccountEdit(){
   $country=include(base_path("/data/country.php"));
   
  $sections=[];
  $id=Auth::id();
  
  $user=User::with("address")->where("id",$id)->first()->toArray();
 
  return view("front.users.my-account-edit",compact("user","sections","country"));
}

  // confirm user account

  public function confirmAccount($code){
    $email=base64_decode($code);
     $count=User::where("email",$email)->count();
     if($count > 0){
     $user=User::where("email",$email)->first();
        if($user->status == 1){
          return redirect("user/register-login")->with("error_message","your account is already activated");
        }else{
          User::where("email",$email)->update(["status"=>1]);
          // send welcome email 
          $messageData=["name"=>$user->name,"email"=>$user->email,"phone"=>$user->phone];
           
          Mail::send("emails.user.confirmation",$messageData,function($message)use($email){
           $message->to($email)->subject(" your account is activated");
          });
          return response()->json(["type"=>"success","success"=> "your account is activated"]);

        }
     }else{
      abort (404);
     }
  }


// forget password
public function forgetPassword(){
$sections=[];
  return view("front.users.forget-password",compact("sections"));
}

// puttin new password
public function newPassword(Request $request){
  if($request->ajax()){
    $data=$request->all();
    $email=$data['email'];

    $validator=Validator::make($data,[
      "email"=>"required|email|max:150|exists:users",
    ]);


    if($validator->passes()){
      $count=User::where("email",$email)->count();
      if($count >0){
        $user=User::where("email",$email)->first();
        $messageData=["name"=>$user->name,"email"=>$user->email,"phone"=>$user->phone,
     "code"=>base64_encode($user['email']) ];
             
        Mail::send("emails.user.new-password",$messageData,function($message)use($email){
         $message->to($email)->subject(" put new password for your account");
        });
        $url="register-login";
        return response()->json(["type"=>"success","url"=> $url ,"success"=> "your account is activated"]);
  
      }else{
        return response()->json(["type"=>"notfound","notfound"=> "there is no account for this email"]);

      }


      
    }else{
      return response()->json(["type"=>"error","errors"=>$validator->messages()]);
    }

  }
 
    
  }// end fun



 

// store new password
public function putNewPassword(Request $request){
  if($request->isMethod("post")){
    //dd("ddddd");
    $data=$request->all();
    $password=$data['new-password'];
    $confim=$data['confirm-password'];
    $email=$data['email'];
    if($password !==$confim){
      return back();
    }


    $validator=Validator::make($data,[
      "new-password"=>"required|min:6",
      
       
    ]);

    if($validator->passes()){
       User::where("email",$email)->update(["password"=> bcrypt($password)]);
      return response()->json(["type"=>"success","success"=> "your new password is successfully inserted"]);

    }else{
      return redirect("user/register-login")->with("success","your new password has been setted successfully");
    }

  }
 
    
  }// end fun


public function NewPasswordForm($code)  {
  $sections=[];
  $email=base64_decode($code);
  return view("front.users.new-password-form",compact("email","sections"));
}

 
// social login
public function redirect($driver){
  return Socialite::driver($driver)->redirect();
}

public function callback($driver){

  try{
  $provider_user= Socialite::driver($driver)->user();

  $user=User::where("provider",$driver)->where("provider_id",$provider_user->id)->first();


  if(!$user){
    $user=User::updateOrCeate([
       "name"=>$provider_user->name,
       "email"=>$provider_user->email,
       "provider"=>$provider_user->name,
       "provider_id"=>$provider_user->id,
       "provider_token"=>$provider_user->token,
       "password"=>Hash::make(Str::random(8)),
    ]);
  }
    Auth::login($user);
    
   return redirect("/");
  } catch(throwable $e){
    return redirect("user/login")->withErrors([
    "email"=>$e->getMessage(),
    ]);

  }
  
}





}// end class
