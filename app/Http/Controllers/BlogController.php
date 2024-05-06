<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogEditReq;
use App\Models\BlogAdd;
use App\Models\CategoryModel;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    //
    public function blog_details($slug){
        try {
            $blog_find = BlogAdd::where('slug', $slug)->firstOrFail();
            
            // Your existing code
            $count = 1;
            $ba = BlogAdd::all();
            $counts = 0;
            $category = CategoryModel::all();
            
            $blog = BlogAdd::where('slug', $slug)->first();
            $popular_posts = BlogAdd::orderBy('count', 'desc')->where('slug', '!=', $slug)->take(2)->get();
            
            $newCount = $blog->count + 1; // Increment the count
            $blog->update([
                'count' => $newCount,
            ]);
            $comments = Comments::where('post_id', $blog->id)->get();
            
            return view('Frontend.blog_details', [
                'blog' => $blog,
                'comments' => $comments,
                'category' => $category,
                'popular_posts' => $popular_posts,
            ]);
        } catch (\Exception $e) {
            // Handle the exception
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
}
       
    
    function user_comment(Request $request,$id){
        // return $request->all();
        if(Auth::guard('user')->user()->id == $request->parent_id){
            return back()->with('error',"Sorry You cannot Give Reply To your own comment");
        }
        if($request->reply != null){
            Comments::create([
                'user_id'=>Auth::guard('user')->user()->id,
                'post_id'=>$id,
                'parent_id'=>$request->parent_id,
                'comment'=>$request->reply,
            ]);
            return back()->with('success',"Successfully Added Comment");
           
        }else{
            return back()->with('error',"You have  given empty comment!!");
        }
       
    }
    public function user_single_comment(Request $request,$id){
        
        Comments::create([
            'user_id'=>Auth::guard('user')->user()->id,
            'post_id'=>$id,
            'parent_id'=>null,
            'comment'=>$request->message,
        ]);
        return back();
    }
    public function category_base_post($name){
        $category = CategoryModel::all();
        $find_cat = CategoryModel::where('category_name',$name)->first();
        $blog = BlogAdd::where('category_id',$find_cat->id)->get();
        return view('Frontend.category_based_post',[
            'category'=>$category,
            'blog'=>$blog,
        ]);
    }
    public function deletePost(Request $request, $id) {
        try {
            // Retrieve the post by ID and delete it
            $post = BlogAdd::findOrFail($id);
            $post->delete();
            
            return response()->json([
                'status' => 'success',
                'message' => 'Post deleted successfully'
            ]);
        } catch (\Exception $e) {
            \Log::error('Error deleting post: ' . $e->getMessage());
            
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while deleting the post.'
            ], 500); // Internal Server Error
        }
    }
    public function blog_edit(BlogEditReq $request,$id){
        
        $blog = BlogAdd::find($id);

        // Retrieve the original values of the fields
        $originalValues = [
            'user_id' => $blog->user_id,
            'title' => $blog->title,
            'category_id' => $blog->category_id,
            'description' => $blog->description,
            'image' => $blog->image, // Add previous image to the original values
            // Add other fields here as needed
        ];
        
        // Retrieve the previous image file name
        $previousImage = $blog->image;
        
        if ($request->hasFile('blog_thumbnail')) {
            // Upload the new image
            $extension = $request->file('blog_thumbnail')->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $request->file('blog_thumbnail')->move(public_path('Blog_thumbnail_image'), $filename);
        
            // Update the database record with the new image file name
            $blog->image = $filename;
        }
        
        // Update other fields
        $blog->user_id = Auth::guard('user')->id();
        $blog->title = $request->title;
        $blog->category_id = $request->category_id;
        $blog->description = $request->Blog_Description;
        // Update other fields as needed
        
        // Check if any changes were made
        $changesMade = false;
        foreach ($originalValues as $field => $value) {
            if ($blog->$field != $value) {
                $changesMade = true;
                break;
            }
        }
        
        // If no changes were made, return with a message
        if (!$changesMade) {
            return back()->with('success', 'No changes were made.');
        }
        
        $blog->save();
        
        // Delete the previous image file from the file system
        if ($request->hasFile('blog_thumbnail') && $previousImage) {
            $previousImagePath = public_path('Blog_thumbnail_image') . '/' . $previousImage;
            if (file_exists($previousImagePath)) {
                unlink($previousImagePath);
            }
        }
        
        return back()->with('success', "Successfully Updated " . $request->title);
}
public function edit_comment(Request $request,$id){
    Comments::where('post_id',$id)->where('user_id',$request->user_id)->where('parent_id',$request->parent_id)->update([
        'comment'=>$request->reply,
    ]);
    return back()->with('success',"Successfully Edited The Comment");
}
}
