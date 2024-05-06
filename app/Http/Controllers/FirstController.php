<?php

namespace App\Http\Controllers;

use App\Models\BlogAdd;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class FirstController extends Controller
{
    public function index(){
      $blog = BlogAdd::orderBy('count', 'desc')->get();
        $category = CategoryModel::all();
     return view('Frontend.index',[
        'blog'=>$blog,
        'category'=>$category,
     ]);
    }
 }
 
