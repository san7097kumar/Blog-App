<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postblogs extends Model
{
    use HasFactory;

    // protected $guarded=['id']; // except ID other fields can fillable

    protected $fillable=['title','slug','excerpt','body','image','category_id','user_id'];
    // for mass assingment allow
    protected $with=['author','category'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false,fn($query,$search)=>
           $query->where(fn($query)=>
           $query->where('title','like','%' .$search. '%')
            ->orWhere('body','like','%' . $search . '%')
           ) 
        );

        $query->when($filters['category'] ?? false,fn($query,$category)=>
             $query->whereHas('category',fn($query)=>
                 $query->where('slug',$category))
               );
    // SELECT * FROM `postblogs` WHERE exists 
    // (SELECT * FROM `categories` WHERE `postblogs`.`category_id` = `categories`.`id` 
    // and `slug` = 'saepe-quia-cupiditate-ipsum-expedita-doloremque-vero') ORDER BY `created_at` DESC

    $query->when($filters['author'] ?? false,fn($query,$author)=>
             $query->whereHas('author',fn($query)=>
                 $query->where('username',$author))
               );


    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Commet::class,'post_id','id');
    }

    public function postlike()
    {
        return $this->hasMany(postlikes::class,'post_id','id');
    }
    
}
