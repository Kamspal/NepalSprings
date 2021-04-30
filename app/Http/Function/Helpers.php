<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Image;

if(!function_exists('image_store')){

	function image_store($image_tmp,$path){
		  if($image_tmp->isValid()){
                    //Resize Image code
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;
                    $large_image_path=$path.'/large/'.$filename;
                    $medium_image_path=$path.'/medium/'.$filename;
                    $small_image_path=$path.'/small/'.$filename;

                    //Resizing Image
                    Image::make($image_tmp)->save($large_image_path);
                    
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                   return $filename;
                 }
	
	}
}

if(!function_exists('image_multiplestore')){

    function image_multiplestore($image_tmp,$path){
          if($image_tmp->isValid()){
                    //Resize Image code
                    $extension=$image_tmp->getClientOriginalExtension();
                    $filename=rand(111,99999).'.'.$extension;

                    $large_image_path=$path.'/large/'.$filename;
                    $medium_image_path=$path.'/medium/'.$filename;
                    $small_image_path=$path.'/small/'.$filename;

                    //Resizing Image
                    Image::make($image_tmp)->save($large_image_path);
                    
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                   return $filename;
                 }
    
    }
}


