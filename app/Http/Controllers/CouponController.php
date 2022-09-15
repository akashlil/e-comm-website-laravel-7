<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Carbon\Carbon;
class CouponController extends Controller
{
    function addcoupon(){
      return view('admin.coupon.index',[
        'coupons'=>Coupon::all()
      ]);

    }
    function addcouponpost(Request $request){
      $request->validate([
        'coupon_name'=>'required|unique:coupons,coupon_name',
        'discount'=>'required|numeric|min:1|max:99',
        'validity'=>'required'
      ]);

      Coupon::insert([
        'coupon_name'=>$request->coupon_name,
        'discount'=>$request->discount,
        'validity'=>$request->validity,
        'created_at'=>Carbon::now(),
      ]);
     return back()->with('success', 'coupon sent successfully');
    }
    function coupondelete($coupon_id){
      Coupon::find($coupon_id)->delete();
      return back();
    }
}
