<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function registration()
    {
        return view('frontend.pages.Profile.new-registration');
    }

    public function registrationstore(Request $request){
       
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'role'=>"user",
        ]);
        return redirect()->route('registration')->with('success','Registered Successfully');
    }

    public function userlogin(){
        return view('frontend.pages.Profile.fron-login');
    }

    public function userdoLogin(Request $request){
    //     //  dd($request->all());
        $userpost=$request->except('_token');
     
         if(Auth::attempt($userpost))
         {
             return redirect()->route('home')->with('success','Login Successfully');
         }
         else
         return redirect()->route('user.login')->withError('error','Invalid user credentials');

     }
     public function logout(){
         Auth::logout();
         return redirect()->route('home')->with('success','Logout Successfully');
     }
}
