<?php

namespace App\Http\Controllers;

use App\Popup;
use File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPopup(Request $request)
    {
        if($request->isMethod('post')){
           

            $popup=new Popup;
        $data=$request->all();
        if($request->hasFile('popup_image')){
  
            $image_tmp=$request->file('popup_image');
            $image_tmp=image_store($image_tmp,'images\backend_images\popup');
             $popup->image=$image_tmp;

        }
        $popup->title=$data['title'];
      
        $popup->save();

        return redirect('/admin/view-popup')->with('success', 'Popup image created');
        

        }
        return view('admin.popup.add_popup');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPopup()
    {
        $popup = Popup::all();
        return view('admin.popup.index', compact('popup'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editPopup(Request $request,$id)
    {
     
        $popup=Popup::where('id',$id)->first();
        return view('admin.popup.edit_popup', compact('popup'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function updatePopup(Request $request,$id)
    {
        

        $data=$request->all();
        
        if($request->hasFile('popup_image')){
  
            $image_tmp=$request->file('popup_image');
            $image_tmp=image_store($image_tmp,'images/backend_images/popup');
            Popup::where(['id'=>$id])->update(['title'=>$data['title'],'image'=>$image_tmp]);
        

               return redirect('/admin/view-popup')->with('flash_message_success','Popup Updated Sucessfully');
          
        }
        
        Popup::where(['id'=>$id])->update(['title'=>$data['title']]);
           
        return redirect('/admin/view-popup')->with('flash_message_success','Popup Updated Sucessfully');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function edit(Popup $popup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popup $popup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Popup  $popup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $popup=Popup::where('id',$id)->first();

        if(!empty($popup)){
          $path='images/backend_images/popup/';
          $image_path_large = $popup->image;  
           $image_path_medium = $popup->image;
            $image_path_small = $popup->image;// Value is not URL but directory file path
          
      
      //Deleting the images in the folder related to the id.
      if(File::exists(public_path($path.'large/'.$image_path_large))) {
      File::delete(public_path($path.'large/'.$image_path_large));
      }else if(File::exists(public_path($path.'medium/'.$image_path_medium))){
      File::delete(public_path($path.'medium/'.$image_path_medium));
      
      }else if(File::exists(public_path($path.'small/'.$image_path_medium))){
      File::delete(public_path($path.'small/'.$image_path_medium));
      }
      $popup->delete();
      $popup = Popup::all();
      return view('admin.popup.index', compact('popup'))->with('flash_message_error', 'Popup Deleted Sucessfully');
        }
        else{
            $popup = Popup::all();
            return view('admin.popup.index', compact('popup'))->with('flash_message_error', 'Popup Deleted Sucessfully');
        }
          
    }
}
