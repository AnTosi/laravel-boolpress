<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //
    protected $fillable = ['title', 'slug', 'image', 'sub_title', 'body', 'category_id'];

    public function getRouteKeyName()
    {
        # code...
        return 'slug'; 
    }

    public function category(): BelongsTo
    {
        # code...
        return $this->belongsTo(Category::class);
    }
}
