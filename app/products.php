<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model {
	public $table = 'products';
	protected $fillable = ['product_id', 'product_name','product_type','product_price','product_pic'];
}