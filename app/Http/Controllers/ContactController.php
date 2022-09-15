<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

    public function contact(Request $request)
    {
      Contact::insertGetId([
        'name'=>$request->fname,
        'email'=>$request->email,
        'subject'=>$request->subject,
        'massage'=>$request->msg,
        'status'=>1,
        'created_at'=>Carbon::now()
      ]);
      return back()->with('successfully', 'massage sent successfully');
    }
}
