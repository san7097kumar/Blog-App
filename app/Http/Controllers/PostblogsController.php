<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postblogs;
use App\Models\Category;
use DB;

class PostblogsController extends Controller
{
    // 

     public function index()
     {

       
        return view('posts',[
            "posts"=>Postblogs::latest()->filter(request(['search','category','author']))->paginate(6)->withQueryString(),
        ]);
     }



     public function show(Postblogs $post)
     {
        return view('post',[
            'post'=> $post,
        ]);
     }

     protected function getposts()
     {

        return Postblogs::latest()->filter()->get();
        // $posts =Postblogs::latest();

        // if(request('search'))
        // {
    
        //        $posts->where('title','like','%' . request('search') . '%')
        //              ->orWhere('body','like','%' . request('search') . '%');
           
        // }

        // return $posts->get();
     }

}
