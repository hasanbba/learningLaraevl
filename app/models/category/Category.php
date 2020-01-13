<?php

namespace App\models\category;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function blogs()
    {
        return $this->hasMany('App\blog\Blog');
    }
}
