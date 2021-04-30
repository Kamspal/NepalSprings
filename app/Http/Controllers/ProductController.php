<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;
use Session;
use App\Product;
use App\ProductsAttribute;
use Illuminate\Support\Facades\Input;
use Storage;
use File;
use Image;


class ProductController extends Controller
{
	public function addProduct(Request $request)
	{

		if ($request->isMethod('post')) {
			 $data = $request->all();
			/*echo "<pre>"; print_r($data); die;*/
			if (empty($data['category_id'])) {
				return redirect()->back()->with('flash_message_error', 'Product must have Category');
			}
			$product = new Product;
			$product->category_id = $data['category_id'];
			$product->product_name = $data['name'];
			$product->product_code = $data['product_code'];
			$product->product_color = $data['product_color'];
			if (!empty($data['description'])) {
				$product->description = $data['description'];
			} else {
				$product->description = '';
			}

			$product->regular_price = $data['regular_price'];
			$product->sale_price = $data['sale_price'];
			$product->available_quantity = $data['available_quantity'];
			$product->in_out_stock = $data['in_out_stock'];
			$product->top_product = $data['top_product'];
			$product->featured_product = $data['feature_product'];
			$product->advisory_information = $data['advisory_information'];
			if ($request->hasFile('featured_image')) {
				$featured_images = [];
				foreach ($request->file('featured_image') as $image_tmp) {
					# code...

					$image_tmp = image_multiplestore($image_tmp, 'images/backend_images/products/Feature_Images');
					array_push($featured_images, $image_tmp);
				}

				$product->featured_image1 = json_encode($featured_images);
			}

			//Upload Image
			if ($request->hasFile('product_image')) {
				$image_tmp = $request->file('product_image');
				
				 if($image_tmp->isValid()){
				 	//Resize Image code
				 	$extension=$image_tmp->getClientOriginalExtension();
				 	$filename=rand(111,99999).'.'.$extension;
				 	$large_image_path='images/backend_images/products/large/'.$filename;
				 	$medium_image_path='images/backend_images/products/medium/'.$filename;
				 	$small_image_path='images/backend_images/products/small/'.$filename;

				 	//Resizing Image
				 	Image::make($image_tmp)->save($large_image_path);

				 	Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
				 	Image::make($image_tmp)->resize(300,300)->save($small_image_path);
				 	$product->product_image=$filename;
				 }
				
			}


			$product->save();

			return redirect('/admin/view-product')->with('flash_message_success', 'Product has been Successfully Added');
		}
		$product_cat = Category::pluck('name', 'id');


		$stock[0] = 'In Stock';
		$stock[1] = 'Out Of Stock';
		$categories = Category::where('parent_id', 0)->get();

		$categories_dropdown = "<option value='' selected disabled>Select</option>";
		foreach ($categories as $cat) {
			$categories_dropdown .= "<option value='" . $cat->id . "'>" . $cat->name . "</option>";
			$sub_categories = Category::where('parent_id', $cat->id)->get();
			foreach ($sub_categories as $sub_cat) {
				$categories_dropdown .= "<option value= '" . $sub_cat->id . "'>&nbsp;--&nbsp;" . $sub_cat->name . "</option>";
			}
		}

		return view('admin.product.add_product')->with(compact('product_cat', 'stock'));
	}

public function productDetail(Request $request,$id){
	$product=Product::find($id);
	$product_category=$product->category_id;
	$user = Auth::user();
	
	$product_by_category=Product::where('category_id',$product->category_id)->take(10)->get();
	
	return view('layouts.product.productdetails',compact('product','user','product_by_category','product_category'));
}


	public function viewProduct()
	{
		$products = Product::get();
		foreach ($products as $key => $value) {
			$category_name = Category::where('id', $value->category_id)->first();
			$products[$key]->category_name = $category_name->name;
			# code... 
		}
		return view('admin.product.view_product')->with(compact('products'));
	}

	public function viewSaleProduct()
	{
		$products = Product::whereRaw('regular_price > sale_price')->get();
		
		return view('admin.saleproduct.view_sale_product')->with(compact('products'));
	}

	public function viewOutOfStockProduct()
	{
		$products = Product::where('in_out_stock', 0)->get();

		return view('admin.outofstock.view_outofstock_product')->with(compact('products'));
	}

	public function editProduct(Request $request, $id)
	{

		if ($request->isMethod('post')) {
			$data = $request->all();
			
/*echo "<pre>"; print_r($data); die;*/
if (empty($data['category_id'])) {
	return redirect()->back()->with('flash_message_error', 'Product must have Category');
}
$product_details=Product::where('id',$id)->first();
$category_id = $data['category_id'];
$product_name = $data['name'];
$product_code = $data['product_code'];
$product_color = $data['product_color'];
if (!empty($data['description'])) {
	$description = $data['description'];
} else {
	$description = '';
}
$regular_price = $data['regular_price'];
$sale_price = $data['sale_price'];
$available_quantity = $data['available_quantity'];
$in_out_stock = $data['in_out_stock'];
$top_product = $data['top_product'];
$featured_product = $data['featured_product'];
$advisory_information = $data['advisory_information'];
if(empty($data['str_image'])){
	$data['str_image']=[];
}
$feature_ext=$data['str_image'];


if ($request->hasFile('featured_image')) {
	$featured_images =Product::find($id);
	$featureimage_json = json_decode($featured_images->featured_image1); //array to json string conversion
	
	
	foreach ($request->file('featured_image') as $image_tmp) {
		# code...

		$image_tmp = image_multiplestore($image_tmp, 'images/backend_images/products/Feature_Images');
		
	
		array_push($feature_ext, $image_tmp);
	
	}

}

//Upload Image
if ($request->hasFile('product_image')) {
	$image_tmp = $request->file('product_image');
	
	 if($image_tmp->isValid()){
		 //Resize Image code
		 $extension=$image_tmp->getClientOriginalExtension();
		 $filename=rand(111,99999).'.'.$extension;
		 $large_image_path='images/backend_images/products/large/'.$filename;
		 $medium_image_path='images/backend_images/products/medium/'.$filename;
		 $small_image_path='images/backend_images/products/small/'.$filename;

		 //Resizing Image
		 Image::make($image_tmp)->save($large_image_path);

		 Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
		 Image::make($image_tmp)->resize(300,300)->save($small_image_path);
		 $product_image=$filename;
	 }
	 
}else{
	$product_image=$product_details->product_image;
}


Product::where(['id'=>$id])->update(['category_id'=>$category_id,'product_name'=>$product_name,'product_code'=>$product_code,'product_color'=>$product_color,'description'=>$description,
'regular_price'=>$regular_price,'sale_price'=>$sale_price,'available_quantity'=>$available_quantity,'in_out_stock'=>$in_out_stock,'top_product'=>$top_product,'featured_product'=>$featured_product,
'advisory_information'=>$advisory_information,'product_image'=>$product_image,'featured_image1'=>$feature_ext]);
return redirect()->back()->with('flash_message_success', 'Product has been Successfully updated');


}
		
		$product_cat = Category::pluck('name', 'id');
		$productDetails = Product::where('id', $id)->first();


		// $categories=Category::where('parent_id',0)->get();
		// $categories_dropdown="<option value='' selected disabled>Select</option>";
		// foreach ($categories as $cat) {
		// 	if($cat->id==$productDetails->category_id){
		// 		$selected="selected";
		// 	}else{
		// 		$selected="";
		// 	}
		// 	$categories_dropdown.="<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";
		// 	$sub_categories=Category::where('parent_id',$cat->id)->get();
		// foreach ($sub_categories as $sub_cat) {
		// 	if($sub_cat->id==$productDetails->category_id){
		// 		$selected="selected";
		// 	}else{
		// 		$selected="";
		// 	}
		// 	$categories_dropdown.="<option value= '".$sub_cat->id."'".$selected.">&nbsp;--&nbsp;".$sub_cat->name."</option>";
		// }


		// }

		//return $productDetails;
		return view('admin.product.edit_product')->with(compact('productDetails', 'product_cat'));
	}

	public function deleteProduct($id)
	{

		


		$product=Product::where('id', $id)->first();
		
		/*  return $product->featured_image;*/
	
		if(!empty($product)){
			
			foreach(json_decode($product->featured_image1) as $feature_image )
			{
				
				$fea_path='images/backend_images/products/Feature_Images';
				$fea_image_path_large = $feature_image;  
				 $fea_image_path_medium = $feature_image;
				  $fea_image_path_small = $feature_image;

				   //Deleting the images in the folder related to the id.
  if(File::exists(public_path($fea_path.'/large/'.$fea_image_path_large))) {
	File::delete(public_path($fea_path.'/large/'.$fea_image_path_large));
 }
 if(File::exists(public_path($fea_path.'/medium/'.$fea_image_path_medium))){
   File::delete(public_path($fea_path.'/medium/'.$fea_image_path_medium));
  
 }
  if(File::exists(public_path($fea_path.'/small/'.$fea_image_path_small))){
	 File::delete(public_path($fea_path.'/small/'.$fea_image_path_small));
 }

				
			}

			
			$path='images/backend_images/products/';
		  $image_path_large = $product->product_image;  
		   $image_path_medium = $product->product_image;
			$image_path_small = $product->product_image;// Value is not URL but directory file path
		  /* return public_path($path.'medium/'.$image_path_small);*/
  
  //Deleting the images in the folder related to the id.
  if(File::exists(public_path($path.'large/'.$image_path_large))) {
	 File::delete(public_path($path.'large/'.$image_path_large));
  }
  if(File::exists(public_path($path.'medium/'.$image_path_medium))){
	File::delete(public_path($path.'medium/'.$image_path_medium));
   
  }
   if(File::exists(public_path($path.'small/'.$image_path_medium))){
	  File::delete(public_path($path.'small/'.$image_path_medium));
  }

   $product->delete();
   $products=product::get();
   return view('admin.product.view_product',compact('products'));
		}
		else{
		 $products=product::get();
		 return view('admin.product.view_product',compact('products'));
		}
  
		
	   
	  }
	

	public function deleteProductImage($id)
	{

		Product::where(['id' => $id])->update(['image' => '']);
		return redirect()->back()->with('flash_message_success', 'Product Image deleted Successfully');
	}


	public function addAttribute(Request $request, $id)
	{
		if ($request->isMethod('post')) {
			$product = $request->all();
			/*echo "<pre>"; print_r($product); die;*/
			foreach ($product['sku'] as $key => $value) {
				# code...
				if (!empty($value)) {
					$attribute = new ProductsAttribute;
					$attribute->product_id = $id;
					$attribute->sku = $product['sku'][$key];
					$attribute->price = $product['price'][$key];
					$attribute->size = $product['size'][$key];
					$attribute->stock = $product['stock'][$key];
					$attribute->save();
				}
			}
			return redirect()->back()->with('flash_message_success', 'Product Attributes added Sucessfully!');
		}
		$product = Product::with('attributes')->where('id', $id)->first();
		/*return $product;*/


		return view('admin.product.add_attributes')->with(compact('product'));
	}

	public function deleteProductAttributes($id)
	{
		if (!empty($id)) {
			$productAttributes = ProductsAttribute::where('id', $id)->delete();
			return redirect()->back()->with('flash_message_success', 'Product Attributes has been deleted Sucessfully!');
		}
	}
}
