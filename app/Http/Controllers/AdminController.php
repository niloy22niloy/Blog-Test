<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\CategoryModel;
use App\Models\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function users_list(){
        $user_lists = UserLogin::all();
        return view('admin_panel.Users.user_list',[
            'user_lists'=>$user_lists,
        ]);
    }
    function category(){
        $categories = CategoryModel::all();
        return view('admin_panel.category.category',[
            'categories'=>$categories,
        ]);
    }
    function category_insert(CategoryRequest $request){
       CategoryModel::insert([
        'category_name'=>$request->category_name,
        'status'=>$request->status,
        'created_at'=> Carbon::now(),
       ]);
       return back()->with('success',"Successfully Inserted " .$request->category_name);
    }
}
