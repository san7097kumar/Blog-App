<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commet;

class CommetController extends Controller
{
    //

    public function add_comment(Request $request)
    {
        $request->validate([
            'body'=>'required'
        ]);
         
        $post_id=$request->post_id;
        $body=$request->body;
        
        // dd(request()->user()->id);
        Commet::create([
            'post_id'=>$post_id,
            'user_id'=>request()->user()->id,
            'body'=>$body
        ]);
        

        return back();

    }
}
