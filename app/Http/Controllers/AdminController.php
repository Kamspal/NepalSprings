<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
Use App\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
class AdminController extends Controller
{

    

     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
       
        if($request->isMethod('post')){
             $data=$request->all();

            
            $request->validate([
                'name' => 'required|string|max:25', 
                'email' => 'required|email|unique:users,email',
                'password' => 'min:8|confirmed',
                
            ]);
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone_number'=>$data['phone'],
                'address'=>$data['address'],
                'password' => bcrypt($data['password']),
                'admin'=>0,
                'image' => 'default-avatar.jpeg'
            ]);
           
    
          
            return redirect('/login')->with('flash_message_success','User Created Successful');
           
        }else{
            return view('auth.register');
        }
        
        
        }
    public function login(Request $request){
    	if($request->isMethod('post')){
            
            $data=$request->input();
            $checkout=session()->get('checkout');
           
            if (Session::has('checkout')){
                
                // do some thing if the key is exist
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                    return redirect('/payment')->withInput();

                }elseif(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'0'])){
                    
                    return redirect('/payment')->withInput();
                    // return redirect('/client/dashboard');
                }else{
               
                    return redirect('/admin/dashboard')->intended()->withInput();
                } 
                
              }else{
                //the key does not exist in the session
                if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                    return redirect()->intended('/admin/dashboard')->withInput();
                }elseif(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'0'])){
                    return redirect()->intended()->withInput();
                    // return redirect('/client/dashboard');
                }else{
                
                    return redirect('/admin');
                }
                
              }
    		
        }

        if (Auth::check()) {
            return redirect('/');
        }else{
            return view('admin.admin_login');
        }
    	
    }

    public function dashboard(){

    return view('admin.dashboard');
    }
      public function settings(){

    return view('admin.settings');
    }

    public function passwordReset(Request $request){
        
        //$input = $request->only('email','_token', 'password', 'password_confirmation');
        

        $input['email']=$request['email'];
            $input['remember_token']=$request['_token'];
            $input['password']=$request['password'];
            $input['password_confirmation']=$request['password_confirmation'];
        $validator = Validator::make($input, [
            'remember_token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        
        if ($validator->fails()) {
           
            return response()->json($validator->errors());
        }

       
        if(Hash::check($input['password'], $input['password_confirmation'])){
            $password=bcrypt($input['password']);
            User::where('email',$input['email'])->update(['password'=>$password]);
        }
        // $response = Password::reset($input, function ($user, $password) {
        //     return $password;
        //     $user->password  = Hash::make($password);
        //     $user->save();
            
        // return 'hey';
        // });
       
 
        $message = $response == Password::PASSWORD_RESET ? 'Password reset successfully' : 'GLOBAL_SOMETHING_WANTS_TO_WRONG';
        return response()->json($message);
    }
    // public function changePassword(Request $request){
    //     return $request;
    //     if (!(Hash::check($request->get('password'), Auth::user()->password))) {
    //         // The passwords matches
    //         return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    //     }
    //     if(strcmp($request->get('password'), $request->get('password_confirmation')) == 0){
    //         //Current password and new password are same
    //         return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    //     }
    //     $validatedData = $request->validate([
    //         'current-password' => 'required',
    //         'new-password' => 'required|string|min:6|confirmed',
    //     ]);
    //     //Change Password
    //     $user = Auth::user();
    //     $user->password = bcrypt($request->get('new-password'));
    //     $user->save();
    //     return redirect()->back()->with("success","Password changed successfully !");
    // }

    public function chkPassword(Request $request){

        $data=$request->all();
     return $data;
        $current_password=$data['current_pwd'];
        $check_password= User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }else{
            echo 'false'; die;
        }

    }

    Public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
            $check_password=User::where(['email'=>Auth::User()->email])->first();
            $current_password=$data['current_pwd'];
             if(Hash::check($current_password,$check_password->password)){
          $password=bcrypt($data['new_pwd']);
          User::where('admin','1')->update(['password'=>$password]);
          return redirect('/admin/settings')->with('flash_message_success','Password Updated Sucessfully');
        }else{
        return redirect('/admin/settings')->with('flash_message_error','Incorrect Password');
        }

        }

    }

public function logout(){

    Session::flush();
    return redirect('/admin')->with('flash_message_success','Logged Out Sucessfully');
    }
   }
