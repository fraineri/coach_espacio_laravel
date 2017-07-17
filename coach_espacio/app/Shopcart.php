<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shopcart extends Model{
    protected $fillable = ['user_id'];
	
	protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function items(){
    	return $this->hasMany('App\Item');
    }
}
