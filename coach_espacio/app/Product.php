<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
	protected $fillable = [
        'name','description','price','category_id','stock','picture','purchable','type'
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function category(){
    	 return $this->belongsTo('App\Category');
    }

    
}
