<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class users extends Model implements Authenticatable 
{
	use BasicAuthenticatable;

	public $table = 'users';

	protected $fillable = ['username','email','password','user_campus','role','avatarurl'];
}