<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = "tbl_order_details";
    protected $primaryKey = 'order_details_id';
    public function product(){
    	return $this->belongsTo("App\Products","product_id","product_id");
    }
}
