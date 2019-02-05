<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shoppingcart extends Model {
	public $table = 'shoppingcart';
	protected $fillable = ['product_id', 'id_user'];
}