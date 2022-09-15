<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Product_multiple_photo;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
      public function __construct()
      {
          $this->middleware('auth');
      }


      public function addproduct()
      {
       return view('admin.product.index',[
         'categories' => Category::all(),
         'products' => Product::all()
       ]);
      }

      public function addproductpost(Request $request)
      {

          $product_id =  Product::insertGetId([
          'product_name'=>$request->product_name,
          'category_id'=>$request->category_id,
          'product_price'=>$request->product_price,
          'product_quantity'=>$request->product_quantity,
          'product_short_description'=>$request->product_short_description,
          'product_long_description'=>$request->product_long_description,
          'product_thumbnail_photo'=>$request->product_thumbnail_photo,
          'created_at'=>Carbon::now(),
        ]);

        $upload_photo = $request->file('product_thumbnail_photo');
        $photo_extension=$upload_photo->getClientOriginalExtension();
        $new_photo_name=$product_id.'.'.$photo_extension;
        $new_location_photo=base_path('public/upload/product_photo/'.$new_photo_name);
        Image::make($upload_photo)->resize(600,622)->save($new_location_photo, 80);
        Product::find($product_id)->update([
          'product_thumbnail_photo'=>$new_photo_name
        ]);
          $f=1;
        foreach ($request->file('product_multiple_photos') as $product_multiple_photo) {
              $upload_photo=$product_multiple_photo;
              $photo_extension=$upload_photo->getClientOriginalExtension();
              // fast product id and  $loop->index + 1
              $new_photo_name=$product_id.'.'. ($f++).'.'.$photo_extension;
              $new_location_photo=base_path('public/upload/product_multiple_photos/'.$new_photo_name);
              Image::make($upload_photo)->resize(600,622)->save($new_location_photo);
              Product_multiple_photo::insert([
                'product_id'=>$product_id,
                'photo_name'=>$new_photo_name,
                'created_at'=>Carbon::now()
              ]);

        }


       return back()->with('message', 'Submit Successfully');
      }
}
