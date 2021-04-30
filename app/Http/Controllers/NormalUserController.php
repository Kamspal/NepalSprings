<?php

namespace App\Http\Controllers;

use App\NormalUser;
use App\Order;
use App\OrderStatus;
use App\SubMenu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NormalUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user_id = Auth::user()->id;

        

        $status = OrderStatus::all();

      

        $normalUsers = User::where('id', $user_id)->first();

        if(Auth::check()==1){

            

            $user_id=Auth::user()->id;

            

            $ordered=Order::where(['user_id'=>$user_id,'shipping_status'=>1])->orderby('id','DESC')->get();

            

            $order_processed=Order::where(['user_id'=>$user_id,'shipping_status'=>2])->orderby('id','DESC')->get();

           

            $order_shipped=Order::where(['user_id'=>$user_id,'shipping_status'=>3])->orderby('id','DESC')->get();

            

           

            $order_delivered=Order::where(['user_id'=>$user_id,'shipping_status'=>4])->orderby('id','DESC')->get();

            $order=Order::where('user_id',$user_id)->get();
           

        }else{

            $user_id=DB::table('users')->where('email',$email)->first();

            $order=Order::where('user_id',$user_id)->get();

            

        }


        return view('normaluser.index', compact('normalUsers', 'ordered', 'order_processed', 'order_shipped', 'order_delivered', 'order', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('normaluser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        //     'phone_number' => 'required|min:10|max:500',
        //     'address' => 'required',
        // ]);

        // $data = new NormalUser();

        // $data->name = $request->Input(['name']);       
        // $data->password = Hash::make($request->Input(['password']));
        // $data->phone_number = $request->Input(['phone_number']);     
        // $data->address = $request->Input(['address']);
        // $data->email = $request->Input(['email']);    
        // $data->save();

        // return redirect('/normaluser')->with('message','User Created Successful');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function show(NormalUser $normalUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $normalUsers = User::find($id);

        return view('normaluser.edit', compact('normalUsers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
      
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|min:10|max:500',
            'address' => 'required',
            
        ]);
       
            if($request->hasFile('image')){
  
                $image_tmp=$request->file('image');
                $image_tmp=image_store($image_tmp,'images/backend_images/user_image');
                User::where(['id'=>$id])->update(['name'=>$request['name'],'email'=>$request['email'],'phone_number'=>$request['phone_number'],'address'=>$request['address'],'image'=>$image_tmp]);
               
            }else{
                User::where(['id'=>$id])->update(['name'=>$request['name'],'email'=>$request['email'],'phone_number'=>$request['phone_number'],'address'=>$request['address']]);
            
            }
             
       


        return redirect('/normaluser')->with('message', 'User profile updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NormalUser  $normalUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(NormalUser $normalUser)
    {
        //
    }
}
