<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class participation extends Model {
	public $timestamps = false;
	public $table = 'participation';
	protected $fillable = ['participation', 'id_user', 'id_events'];
}