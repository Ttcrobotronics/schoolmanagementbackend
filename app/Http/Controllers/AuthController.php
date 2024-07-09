<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    // login function

    public function login(){
        // dd(Hash::make(123456));
      
        if(!empty(Auth::check())){
          
            if(Auth::user()->usertype == "admin")
          {
            return redirect('admin/dashboard');

          }

          else if(Auth::user()->usertype == "teacher")
          {
            return redirect('teacher/dashboard');
            
          }

          else if(Auth::user()->usertype == "student")
          {
            return redirect('student/dashboard');
            
          }

          else if(Auth::user()->usertype == "parent")
          {
            return redirect('parent/dashboard');
            
          }
        }
        // dd(Hash::make(123456));
        return view('auth.login');
    }

    public function AuthLogin(Request $request){
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email,'password' => $request->password],$remember)){

          if(Auth::user()->usertype == "admin")
          {
            return redirect('admin/dashboard');

          }

          else if(Auth::user()->usertype == "teacher")
          {
            return redirect('teacher/dashboard');
            
          }

          else if(Auth::user()->usertype == "student")
          {
            return redirect('student/dashboard');
            
          }

          else if(Auth::user()->usertype == "parent")
          {
            return redirect('parent/dashboard');
            
          }

            // return redirect('admin/dashboard');
        }
        else{
            return redirect()->back()->with('error','Please Enter Correct Email and Password');
        }
    }

     public function forgotpassword(){
      return view('auth.forgot');
     }

     public function PostForgotPassword(Request $request) {
      //  dd($request->all());
      $user = User::getEmailSingle($request->email);
      // dd($getEmailSingle);
      if(!empty($user))
      {
        $user->remember_token = Str::random(30);
        $user->save();
        Mail::to($user->email)->send(new ForgotPasswordMail($user));
        return redirect()->back()->with('success','Please check ypur email and reset your password');
      }
      else
      {
        return redirect()->back()->with('error','Email not found in your System');
      }
     }

      public function reset($remember_token)
      {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
     {
      $data['user'] = $user;
      return view('auth.reset',$data);
     }
     else
     {
      abort(404);
     }
        //  dd($remember_token);
      }

      public function PostReset($token, Request $request){
            if($request->password == $request->cpassword)
            {
              $user = User::getTokenSingle($token);
              $user->password = Hash::make($request->password);
              $user->remember_token = Str::random(30);
              $user->save();
            
              return redirect(url(''))->with('success', 'Password Successfully Reset');
            }
            else
            {
              return redirect()->back()->with('error','Password and Confirm Password does not match');
            }
      }


     public function logout(){
        Auth::logout();
        return redirect(url(''));
     }

}
