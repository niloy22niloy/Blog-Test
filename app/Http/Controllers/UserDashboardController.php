<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogAddRequest;
use App\Models\BlogAdd;
use App\Models\CategoryModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Illuminate\Support\Str;

class UserDashboardController extends Controller
{
    //
    function user_dashboard(){
        return view('Frontend.user_dashboard.layouts.home');
    }
    function user_post_blog(){
        $categories = CategoryModel::all();
        return view('Frontend.user_dashboard.Blog.index',[
            'categories'=>$categories,
        ]);
    }
    function user_blog_add(BlogAddRequest $request){
     
        if ($request->hasFile('thumbnail_image')) {
            $slug = Str::slug($request->Blog_title);
            $title = Str::slug($request->Blog_title); 
        
            
            $extension = $request->file('thumbnail_image')->getClientOriginalExtension();
        
    
            $filename = time() . '.' . $extension;
        
           
            $request->file('thumbnail_image')->move(public_path('Blog_thumbnail_image'), $filename);
        
        
            // Store the file path in the database
            $blog = BlogAdd::create([
                'user_id' => Auth::guard('user')->id(),
                'title' => $request->Blog_title,
                'category_id' => $request->category,
                'description' => $request->Blog_Description,
                'image' => $filename, // Store the file path
                'slug'=>$slug,
                
            ]);  
            return back()->with('success',"Successfully Created". $request->title);     
       
    }

}
public function user_my_blog(){
   
    $blogs = BlogAdd::where('user_id', Auth::guard('user')->id())
                ->latest() 
                ->paginate(3);

    
    return view('Frontend.user_dashboard.Blog.my_blogs',[
        'blogs'=>$blogs,
    ]);
}
public function my_blog_details($slug){
     $blog_find = BlogAdd::where('slug',$slug)->first();
     if(!$blog_find){
        return back()->with('error',"Sorry Blog has been deleted or something else");
     }
    $categories = CategoryModel::all();
    $blog = BlogAdd::where('slug',$slug)->first();
     return view('Frontend.user_dashboard.Blog.my_blog_details',[
        'blog'=>$blog,
        'categories'=>$categories,
     ]);
}
}
