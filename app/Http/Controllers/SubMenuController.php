<?php

namespace App\Http\Controllers;

use App\SubMenu;
use App\Menu;
use Illuminate\Http\Request;

class SubMenuController extends Controller
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
    public function createSubMenu(Request $request)
    {
        $main_Menu=Menu::get();
           if($request->isMethod('post')){
            //fetching the information from the dashboard
                $data=$request->all();


                $submenu=new SubMenu;
    $submenu->subMenuName=$data['subMenuName'];
   $submenu->mainmenuid=Menu::first()->id;
    // $submenu->mainmenuid=$data['mainmenuid'];
          //Saving the Sub menu data to the Sub Menu table in database.
        $submenu->save();
            
            return redirect('/admin/add-submenu')->with('flash_message_success','Sub Main Menu has been Successfully Added');
    }
    else{
        
        return view('admin.Submenu.add_submenu',compact('main_Menu'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SubMenu $subMenu)
    {
        //Show all the submenu in the record
        $main_Menu = Menu::all();

        $sub_Menu = SubMenu::with('menu')->get();
       /* return $sub_Menu;*/
         return view('admin.Submenu.view_submenu',compact('main_Menu','sub_Menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function editSubMenu(Request $request,$id)
    {
        if($request->isMethod('post')){
            //fetching the information from the dashboard
               $data=$request->all();
               $submenu = SubMenu::findorFail($id);
             
             $submenu->subMenuName=$request->input('subMenuName');
            // $submenu->mainmenuid=$request->input('mainmenuid');
            $submenu->mainmenuid=Menu::first()->id;
          //Saving the Sub menu data to the Sub Menu table in database.
            $submenu->save();
            
            return redirect('/admin/view-submenu')->with('flash_message_success','Sub Menu has been Successfully Edited');
            }else{
                 $main_Menu = Menu::pluck('menuName','id'); 
                $submenu = SubMenu::findorFail($id);
                return view('admin.Submenu.edit_submenu', compact('main_Menu','submenu', 'id'));
            }
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubMenu $subMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubMenu  $subMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubMenu $subMenu,$id)
    {
        $submenu = SubMenu::findorFail($id);
        $submenu->delete();
        return redirect('/admin/view-submenu')->with('flash_message_success', 'Submenu is deleted successfully.');
    }
}
