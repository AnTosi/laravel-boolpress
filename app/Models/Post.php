<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'image', 'sub_title', 'body'];

    public function getRouteKeyName()
    {
        # code...
        return 'slug';
    }

}
