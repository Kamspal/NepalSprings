<?php

namespace App\Http\Controllers;

use App\SecondSlider;
use Illuminate\Http\Request;
use File;

class SecondSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = SecondSlider::all();
        return view('admin.secondslider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.secondslider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $slider = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:255'
        ]);
        $slider=new SecondSlider;
        $details=SecondSlider::where('id',1)->first();
       
        $data=$request->all();
        if($request->hasFile('slider_image')){
  
            $image_tmp=$request->file('slider_image');
            $image_tmp=image_store($image_tmp,'images/backend_images/secondslider');
            $slider->image=$image_tmp;

        }
        if($request->hasFile('mobile_slider_image')){
          
            $mobile_image_tmp=$request->file('mobile_slider_image');
            $mobile_image_tmp=image_store($mobile_image_tmp,'images/backend_images/mobile-secondslider');
            $slider->mobile_image=$mobile_image_tmp;

        }
        $slider->title=$data['title'];
        $slider->description=$data['description'];
        $slider->url=$data['url'];
        if(empty($details)){
            $slider->int=1;
        }
        $slider->save();

        return redirect('/secondslider')->with('success', 'Slider image created');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(SecondSlider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondSlider $secondslider)
    {
        $slider=$secondslider;
        return view('admin.secondslider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
 
        $data=$request->all();
        $slider=SecondSlider::where('id',$id)->first();
        if($request->hasFile('slider_image')){
  
            $image_tmp=$request->file('slider_image');
            
            $image_tmp=image_store($image_tmp,'images/backend_images/secondslider');
           
            
        }else{
            $image_tmp=$slider->image;
        }

        if($request->hasFile('mobile_slider_image')){
           
            $mobile_image_tmp=$request->file('mobile_slider_image');
            $mobile_image_tmp=image_store($mobile_image_tmp,'images/backend_images/mobile-secondslider');
        }else{
            $mobile_image_tmp=$slider->mobile_image;
        }
        
        

        if($id==1){
            
            SecondSlider::where(['id'=>$id])->update(['title'=>$data['title'],'description'=>$data['description'],'image'=>$image_tmp,'mobile_image'=>$mobile_image_tmp,'url'=>$data['url'],'int'=>1]);

        }else{
            
            SecondSlider::where(['id'=>$id])->update(['title'=>$data['title'],'description'=>$data['description'],'url'=>$data['url'],'image'=>$image_tmp,'mobile_image'=>$mobile_image_tmp]);
    
        }
           return redirect('/secondslider')->with('flash_message_success','Slider Edited Sucessfully');
               
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondSlider $slider,$id)
    {
        
       
    //    if(!empty($id)){
    //     Slider::where('id',$id)->delete();
    //     return redirect()->back()->with('flash_message_success','Category Deleted Sucessfully');

    // }

     //Deleting the menu with the id from the record.

    $slider=SecondSlider::where('id',$id)->first();

  /*  return $menu->featured_image;*/
  if(!empty($slider)){
    $path='/images/backend_images/secondslider';
    $image_path_large = $slider->image;  
     $image_path_medium = $slider->image;
      $image_path_small = $slider->image;// Value is not URL but directory file path
    /* return public_path($path.'medium/'.$image_path_small);*/

//Deleting the images in the folder related to the id.
if(File::exists(public_path($path.'large/'.$image_path_large))) {
File::delete(public_path($path.'large/'.$image_path_large));
}else if(File::exists(public_path($path.'medium/'.$image_path_medium))){
File::delete(public_path($path.'medium/'.$image_path_medium));

}else if(File::exists(public_path($path.'small/'.$image_path_medium))){
File::delete(public_path($path.'small/'.$image_path_medium));
}
$slider->delete();
$sliders=SecondSlider::get();

return view('admin.secondslider.index',compact('sliders'));
  }
  else{
   $sliders=SecondSlider::get();
  return view('admin.secondslider.index',compact('sliders'));
  }
    }
}