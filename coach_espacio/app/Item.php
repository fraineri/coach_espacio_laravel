<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product;
class Item extends Model{
	public $product;
	public $qty;

	public function __construct($product,$qty){
		$this->product = $product;
		$this->qty = $qty;
	}
}
