<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Product;

class Saledetail extends Model{	

	protected  $table = 'saleDetails';

    protected $fillable = [
        'sale_id','product_id','price_unit','qty', 'updated_at'
    ];


    protected $hidden = [
        'id','created_at',
    ];

    public function product(){
		return $this->belongsTo('App\Product');
	}
}
