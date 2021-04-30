<?php

namespace App\Http\Controllers\API;
use App\Category;
use App\CompanyInfo;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Slider;
use App\SubMenu;
use App\User;
use Image;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Str;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;


class APIController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {

        if(User::where('email', $request->email)->doesntExist()){

            $user = User::create([
                'name' => $request->name, 
                'email' => $request->email, 
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'image' => 'profile.jpg'
            ]);

            return response()->json($user);
        }
        else{

            $response = array(
            
                'user already exists'
            );
            return response()->json( $response);
        }
    }
    
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string'
    //     ]);
         
    //     $credentials = array('email'=>$request->email, 'password'=>$request->password);
    //     if(!Auth::attempt($credentials)) 
        
    //         return response()->json([
    //             'message' => 'Invalid data entered'
    //         ], 401);
            
    //         $accessToken = auth()->user()->createToken('authToken')->accessToken;
            
    //         return response()->json([
    //             'user' => auth()->user(),
    //             'access_token' => $accessToken,
    //             'token_type' => 'Bearer',
    //             'message' => 'Successfully loggedin user!'
    //         ], 201);
    // }

    public $headerArray;

    public function __construct()
    {
        $this->headerArray = [

            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type,x-prototype-version,x-requested-with',
        ];

    }


    public function login(Request $request)
    {
        

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            
            $userInfo = User::where('id', Auth::id())->select('id',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/user_image/small/', image) AS user_image")),
            'name',
            'email',
            'password',
            'phone_number',
            'address')->first([
                
            ]);

            // return $userInfo;
            //$userInfo->success=1;

            $response = array(
                'status' => 'success',
                'message' => $userInfo
            );

        } else {
            $response = array(
                'status' => 'error',
                'message' => 'login failed !!'
            );

        }
        return response()
            ->json($response)->withHeaders($this->headerArray);

    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->accessToken()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    public function Menu(Request $request){
        
        $data['submenu'] = SubMenu::get();
        return response()->json($data);
    }

    public function submenu($id){
        $data['menu'] = Category::where('selectsubmenu',$id)->get();
        return response()->json($data);
          
      }

      public function viewCategory(){
      

        $categories = Category::select( 
            "id",
            "name",
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/category/small/', featured_image) AS imageurl")))
            ->get();
        
        return response()->json($categories);
        
      }

      public function catProducts($id){
        $catProducts = Product::where('category_id',$id)->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url")))->paginate();
        return response()->json($catProducts);
          
      }


    public function viewProduct($id) {
		$products = Product::where('id',$id)->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url")),
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description'
        )
        ->paginate();
		return response()->json($products);
	}

    public function productDetail($id) {
        $productDetail=Product::where('id', $id)->paginate()->get();
        
        return response()->json($productDetail);
    }

    public function slider() {
        $slider = Slider::select(
            'id',
            'title',
            'url',
            //(DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/mobile-slider/large/', image) AS imageurl"))
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/mobile-slider/large/', mobile_image) AS imageurl"))
           
            )
        ->get();

        return response()->json($slider);
    }

    public function second_slider() {
        $slider = Slider::select(
            'id',
            'title',
            'url',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/mobile-secondslider/large/', image) AS imageurl"))
        )
        ->get();

        return response()->json($slider);
    }

    public function hompage_vendor_image_with_url() {
        $homepage_vendor_image_url =['image_path'=>'https://rasanmart.nepyantra.com/images/vendor-banner.jpg','url'=>'/connect-vendors'];
            
        return response()->json($homepage_vendor_image_url);
    }

    public function getLatestProduct() {
        $latest_product=Product::select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url"))
        )->
        latest()
        ->paginate(10);
        return response()->json($latest_product);
    }

    public function getFeaturedProduct(){
        $featured_product=Product::where('featured_product',1)->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url")))
            ->latest()
            ->paginate();
        return response()->json($featured_product);
    }

    public function getTopProduct(){
        $top_product=Product::where('top_product',1)->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url"))
            )->latest()
            ->paginate();
        return response()->json($top_product);
    }

    public function getSimilarProduct($id) {
        $product = Product::find($id);
        $product_by_category=Product::where('category_id',$product->category_id)->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            'featured_image1',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl")),
            (DB::raw("('https://rasanmart.nepyantra.com/images/backend_images/products/Feature_Images/small/') AS feature_images_url"))
        )->
        latest()
        ->paginate();

        return response()->json($product_by_category);
    }

    public function searchResult(Request $request){
        $q = $request->searchText;
       
        

        //$string = 'john  doe';
        
        // split on 1+ whitespace & ignore empty (eg. trailing space)
        $searchValues = preg_split('/\s+/', $q, -1, PREG_SPLIT_NO_EMPTY); 
        
        $product = Product::where(function ($q) use ($searchValues) {
          foreach ($searchValues as $value) {
            $q->orWhere('product_name', 'like', "%{$value}%");
           
          }
          
        })->select(
            'id',
            'category_id',
            'product_name',
            'product_code',
            'product_tags',
            'product_color',
            'description',
            'in_out_stock',
            'top_product',
            'featured_product',
            'sale_product',
            'available_quantity',
            'ingredients',
            'advisory_information',
            'remember_to',
            'meta_title',
            'meta_description',
            'regular_price',
            'sale_price',
            (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS imageurl"))
        )->paginate();
        $product->appends(['searchText' => $q]);
                
                
                
                // $articles = DB::table('products')
                //     ->join('categories', 'products.category_id', '=', 'categories.id')
                //     ->where('product_name','LIKE','%'.$q.'%')->orWhere('name','LIKE','%'.$q.'%')
                //     ->get();
                //  $category=Category::where('name','LIKE','%'.$q.'%')->get();
                  
                if(count($product) > 0 )
                {
        
                    return response()->json($product);
                }else{
                     return ('No Details found. Try to search again !');
         
                }
                
                  } 
                  
        public function logo () {
            $logos = DB::table('logo')->select(
                'id',
                'logo_path',
                (DB::raw("CONCAT('https://rasanmart.nepyantra.com', logo_path) AS logoimageurl"))
            )
            ->get();

            return response()->json($logos);
    }

        public function checkout(Request $request)

        {
            $order_in=Order::orderBy('id','DESC')->first();
            if(empty($order_in)){
              $order_id=1;
            }else{
                
              $order_id=$order_in->id+1;
            }

            $product= json_decode($request->product_id);
           
            foreach($product  as $key=>$prod_id){
              
                $orderDetail = OrderDetail::create([
            
                    'user_id' => $request->user_id,
            
                    'category_id'=>1,
            
                    'product_id' =>$prod_id,
            
                    'order_id'=>$order_id,
            
                    'order_qty' => json_decode($request->order_qty)[$key],
            
                    'delivery_charge'=>0.00,
            
                    'coupon_discount'=>$request->coupon_discount,
            
                    'total_amount_calculated'=>json_decode($request->total_amount_calculated)[$key],
            
                    'total_amount_payable'=>$request->total_amount_payable,
                    'advisory_information'=>$request->advisory_information,
                    'shipping_status'=>1,
            
                    'payment'=>$request->payment
            
                ]);
            
            }
            
       
            $orders = order::create([

                'user_id' => $request->user_id,
    
                'category_id'=>1,
    
                'product_id' =>($request->product_id),
    
                'order_qty' => ($request->order_qty),
    
                'delivery_charge'=>0.00,
    
                'coupon_discount'=>$request->coupon_discount,
    
                'total_amount_calculated'=>($request->total_amount_calculated),
    
                'total_amount_payable'=>$request->total_amount_payable,
    
                'advisory_information'=>$request->advisory_information,
                
    
                'shipping_status'=>$request->shipping_status,
    
                'payment'=>$request->payment,
    
                'delivered'=>$request->delivered
    
    
    
            ]);

         return response('Your Order has been placed Sucessfully !!');

        }
        

        public function changePassword(Request $request)
    {

        
            $email = $request->email;
            $old_password = $request->old_password;
            $new_password = Hash::make($request->new_password);

            if (Auth::attempt(['email' => $request->email, 'password' => $old_password])) {
             User::where(['email'=>$email])->
        update(['password'=> $new_password ]);
return response('your password has been updated Successfully');

            } 
            else {
                return response('old password does not match');
            }
   
    }
    public function UserOrder(Request $request,$id)

    {
        $user_id=$id;
        $order=Order::select('orders.id','user_id','status','coupon_discount','delivery_charge','payment','total_amount_payable','orders.created_at')
        ->leftjoin('order_statuses','order_statuses.id','orders.shipping_status')
        ->orderBy('id','DESC')
        ->where(['user_id'=>$user_id])
        ->Where('shipping_status','!=','4')
        ->paginate(15);
       
        return response()->json($order);
    }
    public function DeliveredUserOrder(Request $request,$id)

    {
        $user_id=$id;
        $order=Order::select('orders.id','user_id','status','coupon_discount','delivery_charge','payment','total_amount_payable','orders.created_at')
        ->leftjoin('order_statuses','order_statuses.id','orders.shipping_status')
        ->orderBy('id','DESC')
        ->where(['user_id'=>$user_id,'shipping_status'=>4])->paginate(5);
       
        return response()->json($order);
    }
    public function UserOrderHistory(Request $request,$id)
    {
        $order_id=$id;
        $oder_history=DB::table('order_details')
        ->select('user_id',
        'product_id',
        'order_qty',
        'total_amount_calculated',
        'product_name',
        'regular_price',
        'sale_price',
        (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/products/small/', product_image) AS productimageurl")))
        ->leftjoin('products','products.id','order_details.product_id')->
        where(['order_id'=>$order_id])->get();
        return response()->json($oder_history);
        }

        public function Customorder(Request $request,$id)
        {
            
            $user_id=$id;
            $order_list = $request->order_list; 
            
            $created_at=Carbon::now();
            if (!empty($user_id)) {
            $orders = DB::table('custom_orders')->insert(['user_id'=>$user_id,
            'order_list'=> $order_list,'created_at'=>$created_at]);
            return response('Custom Order Created successfully');
            } else {
                return response('User id not found');
            }
            
        }


        public function updateUser(Request $request, $id)
        {
        $data = User::find($id);
        $name = $request->name;
        $email = $request->email;
        $phone_number = $request->phone_number;
        $address = $request->address;

        if (!empty($data)) {
            $data->update($request->all());
            $data->save();

        return response('User profile updated successfully');
        } else {
            return response('User id not found');
        }
       
        
    }

    public function updateUserImage (Request $request, $id) {
        $profile = User::find($id);
        $image = $request->image;
      
        if(!empty($profile)){
        
        if($request->hasFile('image')){
  
            $image_tmp=$request->file('image');
    
            if($image_tmp->isValid()){
                //Resize Image code
                $extension=$image_tmp->getClientOriginalExtension();
                $filename=rand(111,99999).'.'.$extension;
                $large_image_path='images/backend_images/user_image/large/'.$filename;
                $medium_image_path='images/backend_images/user_image/medium/'.$filename;
                $small_image_path='images/backend_images/user_image/small/'.$filename;

                //Resizing Image
                Image::make($image_tmp)->save($large_image_path);

                Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                Image::make($image_tmp)->resize(300,300)->save($small_image_path);
                $image=$filename;
            }
                   
              
            User::where(['id'=>$id])->update(['image'=>$image]);
            $user=User::where(['id'=>$id])->select(
                'id',
               'image',
                (DB::raw("CONCAT('https://rasanmart.nepyantra.com/images/backend_images/user_image/small/', image) AS userimageurl"))
            )->first();
            $response = array(
                'status' => 'Sucess',
                'message' => 'User profile image updated successfully',
                'user_image_url'=>$user->userimageurl
            );

      
        return response()
            ->json($response)->withHeaders($user);

            
            //return response('User profile image updated successfully');
        }
            
    }
        else {
            return response('User not Found!!!');
        }

    }

    public function companyInfo() {

        $companyInfo = DB::table('company_infos')->select(
            'id',
            'email',
            'delivery_title',
            'delivery_message',
            'customer_support_message',
            'primary_number',
            'secondary_number',
            'whatsApp_link',
            'viber_link'
        )
        ->get();

        return response()->json($companyInfo);
    }
    
    }



    
