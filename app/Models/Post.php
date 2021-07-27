<?php
namespace App\Models;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Spatie\YamlFrontMatter\YamlFrontMatter;
class Post 
{

    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title,$excerpt,$slug,$date,$body)
    {
        $this->title=$title;
        $this->excerpt=$excerpt;
        $this->slug=$slug;
        $this->date=$date;
        $this->body=$body;
       
    }


    public static function all()
    {
 
      return cache()->rememberForever('posts.all',function(){

        return  collect(File::files(resource_path("posts/")))
        ->map(fn($file) => YamlFrontMatter::parseFile($file))
        ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->slug,
                    $document->date,
                    $document->body()
                ))
                ->sortByDesc('date');
      });

     
    
        // $Files= File::files(resource_path("posts/"));

        // return array_map(function($File){
        //     return $File->getContents();
        // },$Files);
    }

    public static function find($slug)
    {


        $posts = static::all();
        $post= $posts->firstwhere('slug',$slug);

        // dd($post);
        //  $path = resource_path("/posts/{$slug}.html");

            // if(! file_exists($path)){
            //     throw new ModelNotFoundException();
            // }

            // //  $post=file_get_contents($path); // it gives content of the path file 
            
            // $post = cache()->remember("posts.{$slug}",1200,function() use($path)
            // {
            //     // var_dump("file_get_contents")1200
            // return file_get_contents($path);
            // });


            return $post;

    }


}


?>