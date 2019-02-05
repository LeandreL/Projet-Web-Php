<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model {
	public $timestamps = false;
	public $table = 'comments';
	protected $fillable = ['commentary', 'id_user', 'id_events'];
}