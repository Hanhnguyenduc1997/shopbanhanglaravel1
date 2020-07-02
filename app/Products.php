<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
	protected $table = "tbl_product";
    public function category(){
    	return $this->belongsTo("App\CategoryProducts", "category_id", "category_id");
    }
}
