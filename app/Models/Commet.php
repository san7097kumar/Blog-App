<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Postblogs::class,'post_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}

