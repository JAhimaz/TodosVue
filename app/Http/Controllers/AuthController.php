<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AuthController extends Controller
{
  //--------------------------------------
  //Login Functions
  public function showLogin(){
    return view("auth.login");
  }

  public function Login(Request $request){
    $this->validate($request, [
      "email" => "required",
      "password" => "required"
    ]);

    if(Auth::attempt(['email' => $request->email,
                      'password' => $request->password
    ])){
      return redirect()->route('todos.index');
    }else{
      return redirect()->back()->withErrors(['message' => 'Incorrect Email or Password']);
    }
  }
  //--------------------------------------
  //Signup Functions
  public function showSignup(){
    return view("auth.signup");
  }

  public function signup(Request $request){
    $data = $request->validate([
      "email" => "required|unique:users|email",
      "name" => "required|alpha",
      "password" => "required"
    ]);

    $user = User::create($data);

    Auth::login($user);
    return redirect()->route('todos.index');
  }
  //--------------------------------------
  //Logout Function
  public function logout(){
    Auth::logout();
    return redirect()->route('login.show');
  }

}
