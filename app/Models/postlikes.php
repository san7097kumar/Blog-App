<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postlikes extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function postlikes()
    {
        return $this->belongsTo(Postblogs::class,'post_id');
    }

    public function authorlikes()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
