<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model{
    use Sluggable;

    protected $fillable = [
        'name', 'description','picture'
    ];


    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }
}
