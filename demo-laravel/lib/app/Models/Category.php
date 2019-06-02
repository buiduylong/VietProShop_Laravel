<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];

    public function product(){
    	return $this->hasMany('App\Models\Product', 'prod_cate');
    }
}
