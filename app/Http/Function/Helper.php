<?php
namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Auth;
use Image;

function reset(Request $request)
{
    dump($request); // <-------------------------
    $request->validate($this->rules(), $this->validationErrorMessages());

    // Here we will attempt to reset the user's password. If it is successful we
    // will update the password on an actual user model and persist it to the
    // database. Otherwise we will parse the error and return the response.
    $response = $this->broker()->reset(
        $this->credentials($request), function ($user, $password) {
            $this->resetPassword($user, $password);
        }
    );

    // If the password was successfully reset, we will redirect the user back to
    // the application's home authenticated view. If there is an error we can
    // redirect them back to where they came from with their error message.
    return $response == Password::PASSWORD_RESET
                ? $this->sendResetResponse($request, $response)
                : $this->sendResetFailedResponse($request, $response);
}

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


