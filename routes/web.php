<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\PostblogsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CommetController;
use App\Http\Controllers\dashboardController;
use App\Models\Post;
use App\Models\User;
use App\Models\Postblogs;
use App\Models\Category;
use App\Services\NewsLetters;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::post('newsletter',function (){

    request()->validate([
        'email'=>'required'
    ]);

    // dd(request("email"));

// $response = $mailchimp->lists->getListMembersInfo('a1dff8ad83');
try {
     $newsletter = new NewsLetters();
     $newsletter->subscribe(request('email'));
}
catch(\Exception $e){
     throw Illuminate\Validation\ValidationException::withMessages([
         'email'=>'This email could not be added to our list'
     ]);
}




return redirect('/')->with('success',"your email added successfully");

});





Route::get('/collections',[CollectionController::class,'collect']);

Route::get('/htmlposts',function (){

    
    // $posts= collect(File::files(resource_path("posts/")))
    // ->map(fn($file) => YamlFrontMatter::parseFile($file))
    // ->map(fn($document) => new Post(
    //             $document->title,
    //             $document->excerpt,
    //             $document->slug,
    //             $document->date,
    //             $document->body()
    //         ));



    // $Files= File::files(resource_path("posts/"));

    //  $posts = collect($Files)
    //            ->map(function ($file){

    //     $document=YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->slug,
    //         $document->date,
    //         $document->body()
    //     );
    //            });


    
    // $posts= array_map(function ($file){

    //     $document=YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->slug,
    //         $document->date,
    //         $document->body()
    //     );
        
    // },$Files);



    // $posts =[];

    // foreach($Files as $file)
    // {
    //     $document=YamlFrontMatter::parseFile($file);

    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->slug,
    //         $document->date,
    //         $document->body()
    //     );

    // }

    // $document = YamlFrontMatter::parseFile(resource_path('posts/my-thrird-post.html'));

    // ddd($posts[1]);


    $posts =Post::all();
    
    return view('posts',["posts"=>$posts]);
});

// Route::get('/okll',[testController::class,'test']);

// Route::get('/std',[testController::class,'std']);
// Route::resource('students', StudentController::class);

Route::get('/htmlposts/posts/{post}',function ($slug){
 
 return view('post',[
     'post'=>Post::find($slug)
 ]);
});

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++=============+++++++++++++++++++
// database posts
//    \Illuminate\Support\Facades\DB::listen(function ($query){
//        logger($query->sql);
//    });

Route::get('/',[PostblogsController::class,'index']);

Route::get('/posts/{post:slug}',[PostblogsController::class,'show']);

Route::get('/register',[RegisterController::class,'register'])->middleware('guest');

Route::post('/register',[RegisterController::class,'register_store'])->middleware('guest');

Route::get('/login',[RegisterController::class,'login'])->middleware('guest');
Route::post('/login',[RegisterController::class,'login_attempt'])->middleware('guest');

Route::post('/logout',[RegisterController::class,'user_logout'])->middleware('auth');

Route::post('/posts/comments',[CommetController::class,'add_comment'])->middleware('auth');

// DASHBOARD 



Route::get('/add_post',[dashboardController::class,'post_form'])->middleware('auth');
Route::post('/add_post_action',[dashboardController::class,'add_post_action'])->middleware('auth');

Route::post('/user_post_like',[dashboardController::class,'user_post_like'])->middleware('auth');
Route::get('/user_get_post_like',[dashboardController::class,'user_get_post_like'])->middleware('auth');




// Route::get('/category/{category:slug}',function (Category $category)
// {   
        
//     return view('posts',[
//         'posts'=> $category->posts,
//         'categories'=>Category::all(),
//         'currentcategory'=>$category

//     ]);

// });


// Route::get('/author/{author:username}',function (User $author)
// {   

//     return view('posts',[
//         'posts'=> $author->posts
//     ]);

// });

