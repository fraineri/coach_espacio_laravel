<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model{
    protected $fillable = [
        'user_id', 'total','status','name','surname', 'address','city','province','cp','phone','card_name','card_number','card_code','card_expire', 'delivered'
    ];


    protected $hidden = [
        'id','created_at', 'updated_at',
    ];

    public function saledetail(){
        return $this->hasMany('App\Saledetail');
    }
}
