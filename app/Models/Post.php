<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';



    public $timestamps = true;

    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['title', 'image', 'description', 'slug', 'user_id'];

}
