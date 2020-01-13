<?php

namespace App\models\category;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use NodeTrait;
    
    protected $fillable = [
        'name',
    ];

    public function blogs()
    {
        return $this->hasMany('App\blog\Blog');
    }
}
