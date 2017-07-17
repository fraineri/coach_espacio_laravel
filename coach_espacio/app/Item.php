<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product;
class Item extends Model{
	protected $fillable = ['product_id','qty','shopcart_id'];

	public $timestamps = false;

	public function product(){
		return $this->belongsTo('App\product');
	}
}
