<?php

namespace App\blog;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 'desc', 'slug', 'category_id'
    ];
    /**
    * Get the comments for the blog post.
    **/
    public function category()
    {
        return $this->belongsTo('App\models\category\Category');
    }
}