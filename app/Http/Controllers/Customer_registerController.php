<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Hash;

class Customer_registerController extends Controller
{
    function customerregister(){
      return view('customerregister');
    }
    function customerregisterpost(Request $request){
      $request->validate([
        'name'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required|confirmed',
        'password_confirmation'=>'required'
      ]);

      User::insert([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
        'role'=>2,
        'created_at'=>Carbon::now()
      ]);
      return redirect('login');
    }
}
