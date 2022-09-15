<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;

class ProfileController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  // html from
    function index()
    {
       return view('admin.profile.index');
    }
   // admin name change
    public function profilepost(Request $request)
    {
      $request->validate([
        'update_category_name_input'=>'required'
      ]);
           // same work 2 line
       // Auth::user()->id;
       // Auth::id();
       User::find(Auth::id())->update([
         'name'=>$request->update_category_name_input,
       ]);
       return back()->with('success_message', 'YOUR NAME IS UPDATE SUCCESSFULLY ');
    }
    // password change
    function passwordpost(Request $request){
      $request->validate([
        'old_password'=>'required',
        'password'=>'required|confirmed',
        'password_confirmation'=>'required'
      ]);
      // old password  are new password same hobe na
      if($request->old_password == $request->password){
        return back()->with("same","Your old password can not be new password");
      }
      // user je old password ti dibe
        $old_password_user_form=$request->old_password;
        //database theke passsword ana hoyche
        $old_password_user__db = Auth::user()->password;

        //ai dui ti password milate hobe hash ar mathome
        if (Hash::check($old_password_user_form,$old_password_user__db)) {
          User::find(Auth::id())->update([
            'password'=>Hash::make($request->password),
          ]);

        }

        else {
          return back()->with("notmatch","Your old password can not match database password");

        }

        return back()->with("passchange","Your password change SUCCESSFULLY");

    }
  }
