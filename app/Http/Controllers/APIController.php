<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;

class APIController extends Controller
{
    Public function getSubmenu(Request $request){
        
        $data['submenu'] = Category::get();
        return response()->json($data);
    }
}
