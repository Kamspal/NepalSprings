<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;
use Image;
use File;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createMenu(Request $request)
    {
          if($request->isMethod('post')){
            //fetching the information from the dashboard
                $data=$request->all();

    $menu=new Menu;
    $menu->menuName=$data['menuName'];

            //Upload Menu Feature Image
            if($request->hasFile('featured_image')){
                 $image_tmp=$request->file('featured_image');
                 if($image_tmp->isValid()){
                    //Resize Image code
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path='images/backend_images/Menu/large/'.$filename;
                    $medium_image_path='images/backend_images/Menu/medium/'.$filename;
                    $small_image_path='images/backend_images/Menu/small/'.$filename;

                    //Resizing Image
                    Image::make($image_tmp)->save($large_image_path);
                    
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                    $menu->featured_image=$filename;
                 }
            }
            //Saving the menu data to the Menu table in database.
        $menu->save();
            
            return redirect('/admin/add-menu')->with('flash_message_success','Main Menu has been Successfully Added');
    }
    else{
        return view('admin/Menu/add_menu');
    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
        $menu=Menu::get();
      
  
        return view('admin.Menu.view_menu',compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function editMenu(Request $request,$id)
    {
        //Editing the menu details fetching from the database.
        if($request->isMethod('post')){
            $data=$request->all();
          
           $menu = Menu::findorFail($id);
           if($request->hasFile('featured_image')){
               $image_tmp=$request->file('featured_image');
               $image_tmp=image_store($image_tmp,'images/backend_images/Menu');
                $menu->featured_image=$image_tmp;

           }
            $menu->menuName = $request->input('menuName');
                //Updating the Edited Menu details
             $menu->save();
            
            return redirect('/admin/edit-menu/'.$id)->with('flash_message_success','Main Menu has been Successfully Edited');

        }
        else{
            $menu = Menu::findorFail($id);
            return view('admin.Menu.edit_menu', compact('menu', 'id'));
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //Updating the Edited Menu details

         $menu = Menu::find($id);
         return $menu;
        $this->validate($request, array(
            'menuName' => 'required|max:30',
            ));
        //Fetching the data from the Menu related to the id.
        $menu = Menu::where('id', $id)->first();
        if($request->hasFile('featured_image')){
            $photo = $request->file('featured_image');
            $filename = 'cat_pic' . '-' .time() . '.' . $photo->getClientOriginalExtension();
            $location = 'images/categoryImages/';
            $request->file('featured_image')->move($location, $filename);
            $oldFilename = $menu->featured_image;
            $menu->featured_image = 'images/categoryImages/'.$filename;
        }
        $menu->menuName = $request->input('menuName');
        $menu->order = $request->input('order');
        //Saving the updated data to the Menu ,if exists.
        $menu->save();
        return redirect('/menu')->with('Success, ', 'Menu is updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu,$id)
    {
        //Deleting the menu with the id from the record.

        $menu=Menu::where('id',$id)->first();
      /*  return $menu->featured_image;*/
      if(!empty($menu)){
          $path='images/backend_images/Menu/';
        $image_path_large = $menu->featured_image;  
         $image_path_medium = $menu->featured_image;
          $image_path_small = $menu->featured_image;// Value is not URL but directory file path
        /* return public_path($path.'medium/'.$image_path_small);*/

//Deleting the images in the folder related to the id.
if(File::exists(public_path($path.'large/'.$image_path_large))) {
   File::delete(public_path($path.'large/'.$image_path_large));
}else if(File::exists(public_path($path.'medium/'.$image_path_medium))){
  File::delete(public_path($path.'medium/'.$image_path_medium));
 
}else if(File::exists(public_path($path.'small/'.$image_path_medium))){
    File::delete(public_path($path.'small/'.$image_path_medium));
}
 $menu->delete();
 return view('admin.Menu.view_menu',compact('menu'));
      }
      else{
       $menu=Menu::get();
        return view('admin.Menu.view_menu',compact('menu'));
      }

      
     
    }
}
