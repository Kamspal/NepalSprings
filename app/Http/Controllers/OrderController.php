<?php



namespace App\Http\Controllers;


use View;
use App\Order;
use App\OrderDetail;

use App\OrderStatus;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\User;

use Auth;

use Illuminate\Support\Facades\Auth as FacadesAuth;

use Mail;

use Session;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $orders = Order::all();

        return view('admin.order.view_order', compact('orders'));

    }


    public function Payment(Request $request)
    {
        if($request->isMethod('post')){
            return view('/layouts/frontLayout/user_payment_mode');
        }else{
            $cart=Session::get('checkout');
       
            if(Session::has('checkout')){

            return view('/layouts/frontLayout/user_payment_mode');
            }else{
                return redirect('cart');
            }
        }
        
    }

    public function userCheckout(Request $request)

    {      
              if($request->isMethod('post')){
               
            $checkout=session()->get('checkout');
       
            
            foreach($checkout as $check){

                $product_id=$check['product_id'];

                $checkout_quantity=$check['checkout_quantity'];

                $totalprice_product=$check['totalprice_product'];

                $total_discount=$check['total_discount'];

               $delivery_charge=0;

            $total_amount_payable=$check['total_amount_checkout'];
                $payment=$request->payment;
            }
    
       $user_id=Auth::user()->id;
       $user=Auth::user();
       $od=OrderDetail::with('product')->where(['user_id'=>$user_id])->get()->groupBy('order_id');
       
       $email=Auth::user()->email;
      $order_in=Order::orderBy('id','DESC')->first();
      if(empty($order_in)){
        $order_id=1;
      }else{
          
        $order_id=$order_in->id+1;
      }
      
     
foreach($product_id as $key=>$prod_id){
    $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$prod_id)->first();

    $orderDetail = OrderDetail::create([

        'user_id' => $user_id,

        'category_id'=>1,

        'product_id' =>$prod_id,

        'order_id'=>$order_id,

        'order_qty' => $checkout_quantity[$key],

        'delivery_charge'=>$delivery_charge,

        'coupon_discount'=>$total_discount,

        'total_amount_calculated'=>$totalprice_product[$key],

        'total_amount_payable'=>$total_amount_payable,

        'shipping_status'=>1,

        'payment'=>$payment

    ]);

}


        $orders = order::create([

            'user_id' => $user_id,

            'category_id'=>1,

            'product_id' =>json_encode( $product_id),

            'order_qty' => json_encode($checkout_quantity),

            'delivery_charge'=>$delivery_charge,

            'coupon_discount'=>$total_discount,

            'total_amount_calculated'=>json_encode($totalprice_product),

            'total_amount_payable'=>$total_amount_payable,

            'shipping_status'=>1,

            'payment'=>$payment,



        ]);

   

      

           

        $order[]=[

            'user_id' => $user_id,

            'category_id'=>1,

            'product_id' =>json_encode( $product_id),

            'order_qty' => json_encode($checkout_quantity),

            'delivery_charge'=>$delivery_charge,

            'coupon_discount'=>$total_discount,

            'total_amount_calculated'=>json_encode($totalprice_product),

            'total_amount_payable'=>$total_amount_payable,

            'payment'=>$payment,



        ];

        $order_id=DB::table('orders')->where('user_id',$user_id)->latest('id')->first();

        $order_id=$order_id->id;
        $owner_email='sangroula2@gmail.com';
        $to = [['email' => $email],['email' => $owner_email]];
        Mail::send('client_emails.order_invoice', ['order' => $order,'order_id'=>$order_id], function ($message) use ($user,$email) {
            $message->subject('Order Confirmation Invoice');
            $message->from('info@rasanmart.nepyantra.com');
            $message->cc('sangroula2@gmail.com');
            $message->to($email);
           
         });
         session()->forget('checkout');
         session()->forget('cart');
         return view('client_emails.order_invoice',compact('order','order_id'));
        }

    

        $checkout=session()->get('checkout');
       
        if(Session::has('checkout')){

        foreach($checkout as $check){

            $product_id=$check['product_id'];

            $checkout_quantity=$check['checkout_quantity'];

            $totalprice_product=$check['totalprice_product'];

            $total_discount=$check['total_discount'];

             $delivery_charge=0;

            $total_amount_payable=$check['total_amount_checkout'];

        }
        $checkout=session()->get('checkout');
        return $checkout;
        return $role = $this->getPayment(); 

        $user_id=Auth::user()->id;

    

       $user=Auth::user();

       $email=Auth::user()->email;

           

        $order[]=[

            'user_id' => $user_id,

            'category_id'=>1,

            'product_id' =>json_encode( $product_id),

            'order_qty' => json_encode($checkout_quantity),

            'delivery_charge'=>$delivery_charge,

            'coupon_discount'=>$total_discount,

            'total_amount_calculated'=>json_encode($totalprice_product),

            'total_amount_payable'=>$total_amount_payable,

            



        ];
        $order_id=DB::table('orders')->where('user_id',$user_id)->latest('id')->first();
        $order_id=$order_id->id;
        session()->forget('checkout');

        session()->forget('cart');

        return view('client_emails.order_invoice',compact('order','order_id'));

    }else{
       
        return redirect('/cart');

    }

    }

    function getPayment(){

        return 2;
    }
    public function orderAddValue(Request $request)
    {
        if($request->isMethod('post')){

$values = array('name' => $request->orderName,'value' => $request->orderValue);
DB::table('order_values')->insert($values);
return view('admin.Order.view_order_value');
        }
        return view('admin.Order.order_value');
        
    }

    public function orderViewValue()
    {
        $order_value=DB::table('order_values')->get();
  
        return view('admin.Order.view_order_value',compact('order_value'));

    }

    public function orderEditValue(Request $request, $id)
    {
        if($request->isMethod('post')){
            
            $order_value = DB::table('order_values')->where('id', $id)->first();
            DB::table('order_values')->where('id',$id)->update(array(
                'name'=>$request->orderName,'value'=>$request->orderValue
));
$order_value = DB::table('order_values')->where('id', $id)->first();
return view('admin.Order.edit_order_value',compact('order_value'))->with('flash_message_success','Order Value has been Successfully Edited');
        }

        $order_value=DB::table('order_values')->where('id',$id)->first();
        
        return view('admin.Order.edit_order_value',compact('order_value'));

    }

    

    

    public function resultCheckout(Request $request)

    {

        if($request->isMethod('post')){

        $str=strtoupper(Str::random(4)); 

        $user_name=$request->name;

        $email=$request->email;

        $phone_number=$request->phone;

        $address=$request->address;
      
        $payment=$request->payment;

        $password=ucfirst($str).'@'.$request->phone;

        $user=DB::table('users')->where('email',$email)->exists();

        $product_id=$request->product_id;

        $checkout_quantity=$request->checkout_quantity;

        $totalprice_product=$request->totalprice_product;

        $total_discount=$request->total_discount;

        $delivery_charge=0;

        $total_amount_payable=$request->total_amount_payable;

        $advisory_information=$request->review;

        $shipping_status=1;

        $delivered=$request->delivered;

 

        if($user==0){

            $user = User::create([

                'name' => $user_name,

                'email' => $email,

                'password' => bcrypt($password),

                'address' => $address,

                'phone_number' => $phone_number,

                'admin'=>0,
                'image' => 'default-avatar.jpeg'

            ]);

            $data = [

                'details' => 'This email is to notify you of this week sales and challenges we are facing as Sales department',

                'email' => $email,

                'password'=> $password

            ];

            

            Mail::send('client_emails.user_create', ['email' => $email,'password'=>$password], function ($message) use ($user,$email) {

                $message->subject('User Registration');

                $message->from('info@rasanmart.nepyantra.com');

                $message->to($email);
                
                $message->cc('sangroula2@gmail.com');

             });

        }

        

        $user_id=DB::table('users')->where('email',$email)->first();
    
      $order_in=Order::orderBy('id','DESC')->first();
      if(empty($order_in)){
        $order_id=1;
      }else{
          
        $order_id=$order_in->id+1;
      }  

               
foreach($product_id as $key=>$prod_id){
    $prod=DB::table('products')->select('product_name','product_image','sale_price','regular_price')->where('id',$prod_id)->first();

    $orderDetail = OrderDetail::create([

        'user_id' => $user_id->id,

        'category_id'=>1,

        'product_id' =>$prod_id,

        'order_id'=>$order_id,

        'order_qty' => $checkout_quantity[$key],

        'delivery_charge'=>$delivery_charge,

        'coupon_discount'=>$total_discount,

        'total_amount_calculated'=>$totalprice_product[$key],

        'total_amount_payable'=>$total_amount_payable,

        'shipping_status'=>1,

        'payment'=>$payment

    ]);

}




        $orders = order::create([

            'user_id' => $user_id->id,

            'category_id'=>1,

            'product_id' =>json_encode( $product_id),

            'order_qty' => json_encode($checkout_quantity),

            'delivery_charge'=>$delivery_charge,

            'coupon_discount'=>$total_discount,

            'total_amount_calculated'=>json_encode($totalprice_product),

            'total_amount_payable'=>$total_amount_payable,

            'advisory_information'=>$advisory_information,
            

            'shipping_status'=>$shipping_status,

            'payment'=>$payment,

            'delivered'=>$delivered



        ]);

   

      

           

        $order[]=[

            'user_id' => $user_id->id,

            'category_id'=>1,

            'product_id' =>json_encode( $product_id),

            'order_qty' => json_encode($checkout_quantity),

            'delivery_charge'=>$delivery_charge,

            'coupon_discount'=>$total_discount,

            'total_amount_calculated'=>json_encode($totalprice_product),

            'total_amount_payable'=>$total_amount_payable,

            'advisory_information'=>$advisory_information,

            'shipping_status'=>$shipping_status,
            'payment'=>$payment,

            'delivered'=>$delivered



        ];

        $order_id=DB::table('orders')->where('user_id',$user_id->id)->latest('id')->first();

        $order_id=$order_id->id;



        Mail::send('client_emails.order_invoice', ['order' => $order,'order_id'=> $order_id], function ($message) use ($user,$email) {

            $message->subject('Order Confirmation Invoice');

            $message->from('info@rasanmart.nepyantra.com');

            $message->to($email);
            $message->cc('sangroula2@gmail.com');

         });

         session()->forget('checkout');

         session()->forget('cart');

         return view('client_emails.order_invoice',compact('order','order_id'));

        }

    

    

      

        if(Auth::check()==1){

            

            $user_id=Auth::user()->id;

            

            $ordered=Order::where(['user_id'=>$user_id,'shipping_status'=>1])->orderby('id','DESC')->get();
           $product= DB::table('products')->get();
           

            $order_processed=Order::where(['user_id'=>$user_id,'shipping_status'=>2])->orderby('id','DESC')->get();

           

            $order_shipped=Order::where(['user_id'=>$user_id,'shipping_status'=>3])->orderby('id','DESC')->get();

            

           

            $order_delivered=Order::where(['user_id'=>$user_id,'shipping_status'=>4])->orderby('id','DESC')->get();

          

           

        }else{

            $user_id=DB::table('users')->where('email',$email)->first();

            $order=Order::where('user_id',$user_id)->get();

            

        }

// return $order;

     return view('layouts.order.order_detail',compact('ordered','order_processed','order_shipped','order_delivered'));





    }



    Public function orderStatus(Request $request){

        $order=Order::orderBy('created_at', 'DESC')->get();

     

        $status=OrderStatus::select('id','status')->get();
        return view('admin.Order.order_edit_status',compact('order','status'));
    }

    Public function print(Request $request,$id){

        $order=Order::where('id',$id)->get();
        $order_id=$id;
        $view = View::make('client_emails.order_invoice',compact('order','order_id')); 
        
 return $view->render();
     
    }

    public function orderDelete($id){

        

        Order::where('id',$id)->delete();

        return redirect()->back();

    }



    Public function changeStatus(Request $request,$id){

        

        Order::where(['id' => $id])->update(['shipping_status' => $request->status]);

        $order=Order::where('id',$id)->get();

        return $order;

    }

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

        //

    }



    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        //

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\Order  $order

     * @return \Illuminate\Http\Response

     */

    public function show(Order $order)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Order  $order

     * @return \Illuminate\Http\Response

     */

    public function edit(Order $order)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Order  $order

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Order $order)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Order  $order

     * @return \Illuminate\Http\Response

     */

    public function destroy(Order $order)

    {

        //

    }

}

