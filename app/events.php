<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model {
	public $table = 'events';
	protected $fillable = ['event_name','event_type','event_date','event_desc','event_cat','event_pic'];
}