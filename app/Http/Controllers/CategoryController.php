<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Menu;
use Illuminate\Support\Str;

use App\SubMenu;
use App\Product;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    public function addCategory(Request $request){
    	if($request->isMethod('post')){
        $data=$request->all();

        $arr = explode(" ",$data['name']);
       $string= implode("-",$arr);
       $url=Str::lower($string);
     
    		$category=new Category;
if($request->hasFile('featured_image')){
  
               $image_tmp=$request->file('featured_image');
               $image_tmp=image_store($image_tmp,'images/backend_images/category');
                $category->featured_image=$image_tmp;

           }
          

    		$category->name= $data['name'];
    		$category->description=$data['description'];
            $category->selectmainmenu=Menu::first()->id;
             $category->selectsubmenu=$data['subMenuName'];
    		$category->url=$url;
    		$category->save();
    		return redirect('/admin/view-category')->with('flash_message_success','Category Added Sucessfully');
    	}else{
                 $mainmenu = Menu::pluck('menuName','id');

      //return $mainmenu;
     
        $submenu = SubMenu::pluck('subMenuName','id');
        $levels=Category::where('parent_id',0)->get();
        return view('admin.category.add_category')->with(compact('mainmenu','submenu','levels'));
        }
    	
    }

    public function viewCategory(){
      $categories=Category::with('menu','subMenu')->get();
      // return $categories;
        $sub_Menu = SubMenu::with('menu')->get();
    	return view('admin.category.view_category')->with(compact('categories'));

    }

    Public function getSubmenu(Request $request){
        
        $data['submenu'] = SubMenu::where("mainmenuid",$request->menu_id)
                    ->get(["subMenuName","id"]);
        return response()->json($data);
    }

    public function editCategory(Request $request,$id){
   if($request->isMethod('post')){
    		$data=$request->all();
        $arr = explode(" ",$data['url']);
        $string= implode("-",$arr);
        $url=Str::lower($string);
if($request->hasFile('featured_image')){
  
               $image_tmp=$request->file('featured_image');
               $image_tmp=image_store($image_tmp,'images/backend_images/category');
               Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description'],'selectsubmenu'=>$data['selectsubmenu'],'featured_image'=>$image_tmp,'url'=>$url]);
               return redirect('/admin/view-category')->with('flash_message_success','Category Edited Sucessfully');
             

           }

    		Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description'],'selectsubmenu'=>$data['selectsubmenu'],'url'=>$url]);
    	return redirect('/admin/view-category')->with('flash_message_success','Category Edited Sucessfully');
    	}
    
        $category = Category::findorFail($id);
    	/*return $category;*/
    	 $levels=Category::where('parent_id',0)->get();
             $mainmenu = Menu::pluck('menuName','id');
     
        $submenu = SubMenu::pluck('subMenuName','id');
    	return view('admin.category.edit_category')->with(compact('category','levels','mainmenu','submenu'));
    }


    public function productCategoryDisplay($id){
      $category=Category::where('id',$id)->first();
      $category_name=$category->name;
      
      $product=Product::where('category_id',$id)->latest()->sortable()->paginate(12);;
      
      return view('layouts.frontLayout.product_category',compact('product','id','category_name'));
 

    }
    public function productSubmenuDisplay($id){

   
      $submenu=SubMenu::where('id',$id)->first();
     $submenu_name=$submenu->subMenuName;

     $product = Product::join( 'categories','categories.id', '=', 'products.category_id')
     ->join('sub_menus', 'sub_menus.id', '=', 'categories.selectsubmenu')
     ->where('selectsubmenu',$id)
    ->sortable()->paginate(12);
     
      return view('layouts.frontLayout.product_main_category',compact('product','id','submenu_name'));
    }
    
    Public function deleteCategory($id){
    	
    	if(!empty($id)){
    		Category::where('id',$id)->delete();
    		return redirect()->back()->with('flash_message_success','Category Deleted Sucessfully');

    	}

         //Deleting the menu with the id from the record.

        $category=Category::where('id',$id)->first();
      /*  return $menu->featured_image;*/
      if(!empty($category)){
          $path='images/backend_images/category/';
        $image_path_large = $category->featured_image;  
         $image_path_medium = $category->featured_image;
          $image_path_small = $category->featured_image;// Value is not URL but directory file path
        /* return public_path($path.'medium/'.$image_path_small);*/

//Deleting the images in the folder related to the id.
if(File::exists(public_path($path.'large/'.$image_path_large))) {
   File::delete(public_path($path.'large/'.$image_path_large));
}else if(File::exists(public_path($path.'medium/'.$image_path_medium))){
  File::delete(public_path($path.'medium/'.$image_path_medium));
 
}else if(File::exists(public_path($path.'small/'.$image_path_medium))){
    File::delete(public_path($path.'small/'.$image_path_medium));
}
 $category->delete();
 $category=Category::get();
 return view('admin.category.view_category',compact('category'));
      }
      else{
       $category=Category::get();
      return view('admin.category.view_category',compact('category'));
      }

      

    }
}
