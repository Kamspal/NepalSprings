<?php

namespace App\Http\Controllers;
use App\Slider;
use App\SecondSlider;
use App\Product;
use App\Category;
use App\Popup;
use Auth;
use Illuminate\Support\Facades\Input;
use Request;
use DB;
use Carbon\Carbon;


class IndexController extends Controller
{
    public function index(){
        $SliderImage=Slider::latest()->get();
        $SliderSecond=SecondSlider::latest()->get();
        $product=Product::latest()->take(15)->get();
        $categories=Category::get();
        $modals=Popup::get();
        $user='Yogendra';
        $top_product=Product::latest()->where('top_product',1)->take(15)->get();
     
        $featured_product=Product::latest()->where('featured_product',1)->take(15)->get();
      
    	return view('welcome',compact('SliderImage','SliderSecond' ,'product','user','top_product','featured_product','user','categories', 'modals'));
    }
    
    public function latestProduct(){
        $featured_product=Product::limit(10)->sortable()->paginate();
        return view('layouts.frontLayout.latest_product',compact('featured_product'));
    }

    public function featureProduct(){
        $featured_product=Product::where('featured_product',1)->sortable()->paginate(20);
        return view('layouts.frontLayout.feature_product',compact('featured_product'));
    }
   
    public function topProduct(){

        $top_product=Product::where('top_product',1)->sortable()->latest()->paginate(20);
       
        return view('layouts.frontLayout.top_product',compact('top_product'));
   

    }
    public function autocomplete(Request $request,$name)
    {
        
        $q = $name;
        $exact_product = Product::where('product_name',$q)->get();
        // split on 1+ whitespace & ignore empty (eg. trailing space)
        $searchValues = preg_split('/\s+/', $q, -1, PREG_SPLIT_NO_EMPTY); 
        
        $product = Product::where(function ($q) use ($searchValues) {
        
          foreach ($searchValues as $value) {
            $q->orWhere('product_name', 'like', "%{$value}%");
           
          }
          
        })->limit(5)->get();
        
        $product = array_merge($exact_product->toArray(), $product->toArray());
    
        return response()->json($product);
          
    }
    public function search(){
        $q = Request::get ( 'search-text' );
       
        

//$string = 'john  doe';

// split on 1+ whitespace & ignore empty (eg. trailing space)
$searchValues = preg_split('/\s+/', $q, -1, PREG_SPLIT_NO_EMPTY); 

$product = Product::where(function ($q) use ($searchValues) {
  foreach ($searchValues as $value) {
    $q->orWhere('product_name', 'like', "%{$value}%");
   
  }
  
})->sortable()->paginate();
$product->appends(['search-text' => $q]);
        
        
        
        // $articles = DB::table('products')
        //     ->join('categories', 'products.category_id', '=', 'categories.id')
        //     ->where('product_name','LIKE','%'.$q.'%')->orWhere('name','LIKE','%'.$q.'%')
        //     ->get();
        //  $category=Category::where('name','LIKE','%'.$q.'%')->get();
          
        if(count($product) > 0 )
        {

            return view('layouts.frontLayout.search_product',compact('q'))->withDetails($product)->withQuery ( $q );
        }else{
             return view ('layouts.frontLayout.search_product')->withMessage('No Details found. Try to search again !');
 
        }
        
          }
}
