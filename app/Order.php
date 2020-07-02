<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='tbl_order';

    public function user(){
    	return $this->belongsTo("App\User","customer_id",'id');
    }

    public function orderDetail(){
    	return $this->hasMany("App\OrderDetail","order_id","order_id");
    }

    public function shipping(){
    	return $this->belongsTo("App\Shipping","order_id","shipping_id");
    }
}
