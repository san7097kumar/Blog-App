<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Postblogs;
use App\Models\postlikes;

class dashboardController extends Controller
{
    //
    public function post_form() 
    {
        $categories=Category::all();
       return view('dashboard.add_posts')->with('categories',$categories);
    }

    public function add_post_action(Request $request)
    {
       
       $attributes= $request->validate([
            'title'=>'required|min:10|max:500',
            'slug'=>'required|min:5|unique:postblogs,slug',
            'category'=>'required',
             'excerpt'=>'required|min:100',
            'post'=>'required|min:300',
            'photo'=>'image'
        ]);

        $imageName = time().'.'.$request->photo->extension();  
     
        // $request->photo->move(public_path('images/posts'), $imageName);
       
        // $db_image_path='images/posts/'.$imageName;
        // dd(request()->user()->id);
        //storage folder
        $request->photo->move(storage_path("app/public/images/posts"), $imageName);
        // $request->photo->storeAs('public/images/posts', $imageName);

        $db_image_path='storage/images/posts/'.$imageName;
         
         Postblogs::create([
             'title'=>$request->title,
             'slug'=>$request->slug,
             'excerpt'=>$request->excerpt,
             'body'=>$request->post,
             'image'=>$db_image_path,
             'category_id'=>$request->category,
             'user_id'=>auth()->user()->id
         ]);



       return back()->with('success','successfully added post');
    }


    public function user_post_like(Request $request)
    {
        $request->validate([
             'post_id'=>'required'
        ]);
        $like=0;
        $count=postlikes::where('post_id',$request->post_id)
                         ->where('user_id',auth()->user()->id)
                         ->count();
        if($count==0)   
        {
            postlikes::create([
                'post_id'=>$request->post_id,
                'user_id'=>auth()->user()->id
            ]);
            $like=1;
        }  
        else
        {
            postlikes::where('post_id',$request->post_id)
                         ->where('user_id',auth()->user()->id)
                         ->delete();
        }            
        $post_count=$this->get_post_likes($request->post_id);
        return response()->json(["like" =>$like,"post_count"=>$post_count]);

    }

    public function user_get_post_like(Request $request)
    {
        $like=postlikes::where('post_id',$request->post_id)
                         ->where('user_id',auth()->user()->id)
                         ->count();
         $post_count=$this->get_post_likes($request->post_id);
         return response()->json(["like" =>$like,"post_count"=>$post_count]);                  
    }

    private function get_post_likes($post_id)
    {
        $post_counts=postlikes::where('post_id',$post_id)
        ->count();
        return $post_counts;
    }



}
