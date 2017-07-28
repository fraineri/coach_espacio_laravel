<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class Shopcart extends Model{
    protected $fillable = ['user_id', 'updated_at'];
	
	protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function items(){
    	return $this->hasMany('App\Item');
    }

    public function getTotal(){
    	$total = 0;
    	foreach ($this->items as $it) {
    		$total += $it->product->price*$it->qty;
    	}
    	return $total;
    }
}
