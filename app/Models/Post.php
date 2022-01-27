<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function getRouteKeyName()
    {
        # code...
        return 'slug';
    }

    protected $fillable = ['title', 'image', 'sub_title', 'text'];
}
