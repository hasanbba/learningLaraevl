<?php

namespace App\models\book;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [

        'title', 'author',

    ];
}
