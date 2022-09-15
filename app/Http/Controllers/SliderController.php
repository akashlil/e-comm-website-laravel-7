<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function slider()
    {
      // code...
      return view('admin.slider.slider',[
        'silders'=>Slider::all()
      ]);
    }

    public function sliderpost(Request $request){
      $slider_id =  Slider::insertGetId([
      'slider_header'=>$request->slider_header,
      'slider_paragraph'=>$request->slider_paragraph,
      'slider_photo'=>$request->slider_photo,
      'created_at'=>Carbon::now(),
    ]);

    $upload_photos = $request->file('slider_photo');
    $photo_extension=$upload_photos->getClientOriginalExtension();
    $new_photo_name=$slider_id.'.'.$photo_extension;
    $new_location_photo=base_path('public/upload/slider_photo/'.$new_photo_name);
    Image::make($upload_photos)->resize(1920,1000)->save($new_location_photo,100);

    Slider::find($slider_id)->update([
      'slider_photo'=>$new_photo_name
    ]);
         return back()->with('message', 'Submit Successfully');
    }

    function sliderdeletes($slider_id){
      Slider::find($slider_id)->Delete();
      return back()->with('delete_sms','Delete successfully');

    }

}
