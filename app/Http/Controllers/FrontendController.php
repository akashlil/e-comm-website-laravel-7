<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Contact;
use App\Product;
use App\Slider;
use App\Order_list;
use App\Product_multiple_photo;

class FrontendController extends Controller
{



  public function index(){
    return view('index',[
      'categories'=>Category::all(),
      'products'=>Product::latest()->get(),
      'best_sellers'=>Order_list::all(),
      'sliders'=>Slider::all()
    ]);
  }

     public function contact(){
      return view('contact');
    }
     public function seencontect($contectseen){
      Contact::find($contectseen)->update([
        'status'=>2,
      ]);
      $contect_id= Contact::find($contectseen);
    return view('contactseen',compact('contect_id'));
    }
     public function contactsent(){
      return view('contactadmin',[
        'contect_message_sent'=>Contact::all()

      ]);
    }


    public function about(){
      return view('about');
    }
    public function productdetails($product_id){
      $Category_id =Product::find($product_id)->category_id;
      return view('single_product',[
        'product_single_info'=>Product::find($product_id),
        'related_product_info'=>Product::where('category_id',$Category_id)->where('id','!=',$product_id)->limit(4)->get(),
        'multiple_photos'=>Product_multiple_photo::where('product_id',$product_id)->get(),
      ]);
    }


    public function shop(){
      return view('shop',[
        'categories'=>Category::all(),
        'products'=>Product::all()
      ]);
    }

}
