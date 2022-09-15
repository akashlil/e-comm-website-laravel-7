<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;
use Carbon\Carbon;
use Image;


class CategoryController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

    public function addcategory()
    {
        $categories = Category::all();
         $delete_datas_recovery=Category::onlyTrashed()->get();
       return view('admin.category.index', compact('categories','delete_datas_recovery'));
    }


 // add category
    public function addcategorypost(Request $request)
    {

       $request->validate([
         'category_name_input'=>'required|unique:categories,category_name',
         'category_photo_input'=>'required|image',

       ],[
         'category_name_input.required'=>'আমি তোমাকে ঢুকতে দিবো না ।  তুমি আগে  আইটেম  অ্যাড  কর ।',
         'category_name_input.unique'=>'you can not use category_name'

       ]);
        // upload photo id ber kora...
       $category_id = Category::insertGetId([
        'category_name'=>$request->category_name_input,
        'user_id'=>Auth::id(),
        'category_photo'=>$request->category_name_input,
        'created_at'=>Carbon::now()

       ]);
       // photo upload code.......
       // input photo dora
        $upload_photo = $request->file('category_photo_input');
        // extension ber kora...jpg,png,jpeg..etc
        $photo_extension=$upload_photo->getClientOriginalExtension();
        // new photo name tori kora ...1.jpg,2.jpg,3.jpg...etc
        $new_photo_name=$category_id.'.'.$photo_extension;
        //new location sathe photo link kora ...
        $new_location_photo=base_path('public/upload/category_photo/'.$new_photo_name);
        // new location photo save kora....
        Image::make($upload_photo)->resize(600,470)->save($new_location_photo, 99);
        // database name update
        Category::find($category_id)->update([
          'category_photo'=>$new_photo_name
        ]);

       return back()->with('success_message','you category added successfully');

    }

    // Update Category datashow
    function updatecategory($category_id){
       $category_name=Category::find($category_id)->category_name;
       $category_photo=Category::find($category_id)->category_photo;
        return view('admin.category.update',compact('category_name','category_id','category_photo'));

    }
    function updatecategorypost(Request $request){
      if ($request->hasFile('category_photo_inputs')) {
        // old photo delete
        $delete_location_photos=base_path('public/upload/category_photo/'. Category::find($request->update_category_id)->category_photo);
        unlink($delete_location_photos);
        // new photo update
        $upload_photo = $request->file('category_photo_inputs');
        $photo_extension=$upload_photo->getClientOriginalExtension();
        $new_photo_name=$request->update_category_id.'.'.$photo_extension;
        $new_location_photo=base_path('public/upload/category_photo/'.$new_photo_name);
        Image::make($upload_photo)->resize(600,470)->save($new_location_photo, 99);
        Category::find($request->update_category_id)->update([
          'category_photo'=>$new_photo_name
        ]);
      }
      // category name update
       Category::find($request->update_category_id)->update([
         'category_name'=>$request->update_category_names,
       ]);
        return Redirect('/add/category')->with('update','Updated successfully');
     }

    // delete method
    function deletecategory($category_id_delete)
    {
      Category::find($category_id_delete)->delete();
      return back()->with('delete_sms','Delete successfully');
    }
    public function restorecategory($category_id_restore)
    {
     Category::withTrashed()->find($category_id_restore)->restore();
     return back();
    }
    public function harddeletecategory($category_id_hard)
    {
     $delete_location_photo=base_path('public/upload/category_photo/'.Category::onlyTrashed()->find($category_id_hard)->category_photo);
     unlink($delete_location_photo);
     Category::onlyTrashed()->find($category_id_hard)->forceDelete();
     return back();
    }
}
