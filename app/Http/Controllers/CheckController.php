<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\Order_list;
use Carbon\Carbon;
use App\Cart;
use App\Product;

class CheckController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }
      function index( Request $request){
        if (Auth::user()->role == 1) {
          echo "you can not buy";
        }
        else{
          return view('checkout',[
            'carts' => Cart::where('ip_address', request()->ip())->get(),
            'finel_totals' =>$request->totals
          ]);
        }
      }

    public function checkoutpost(Request $request){

      if ($request->payment_option == 1) {

            $order_id=Order::insertGetId([
                    'user_id'=>Auth::id(),
                    'first_name'=>$request->first_name,
                    'email_address'=>$request->email_address,
                    'phone_no'=>$request->phone_no,
                    'country'=>$request->country,
                    'address'=>$request->address,
                    'postcode'=>$request->postcode,
                    'city'=>$request->city,
                    'notes'=>$request->notes,
                    'payment_option'=>$request->payment_option,
                    'sub_totoal'=>$request->sub_totoal,
                    'finel_totals'=>$request->finel_totals,
                    'created_at'=>Carbon::now()
                  ]);

              foreach (Cart::where('ip_address', request()->ip())->get() as $cart) {
                // code...
                Order_list::insert([
                  'order_id'=>$order_id,
                  'user_id'=>Auth::id(),
                  'product_id'=>$cart->product_id,
                  'quantity'=>$cart->quantity,
                  'created_at'=>Carbon::now()
                ]);
               Product::find($cart->product_id)->decrement('product_quantity',$cart->quantity);
                Cart::find($cart->id)->delete();
              }
               return redirect('/');
        // code...
      }

      else {
        return view('stripe',[
          'request_all_data'=>$request->all()
        ]);
      }



      }
}
