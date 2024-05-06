<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRegisterController extends Controller
{
    //
    public function register(){
        if(Auth::guard('user')->check()){
            return redirect()->route('index');
        }else{
            return view('Frontend.Register&Login.user_register');
        }
     
       
    }
    public function register_post(UserRegisterRequest $request){
        UserLogin::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);
        return back()->with('success',"Successfully Registered");
    }
    

    public function user_login(){
        if(Auth::guard('user')->check()){
            return redirect()->route('index');
        }else{
            return view('Frontend.Register&Login.user_login');
        }
        
    }
    public function user_login_post(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::guard('user')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            return redirect('/')->with('success',"Successfully Logged In");
            
        } else {
            // Authentication failed
            return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }
    public function user_logout(){
        if (Auth::guard('user')->check()) {
            
            Auth::guard('user')->logout();
            return redirect()->route('index')->with('success',"Successfully Logged Out");
        }
    
      
    }
}
