<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $guarded = [];

    public function category(){
    	return $this->belongsTo('App\Models\Category', 'prod_cate', 'cate_id');
    }
}
