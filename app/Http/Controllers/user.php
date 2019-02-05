<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class user extends Controller
{
	public function adduser() // Traite le formulaire d'inscription et insère dans la bdd un nouvel utilisateur

	{
   	
	   	request()->validate([
	   		'condition' => ['required'],
			'username' => ['required'],
			'email' => ['required', 'email'],
			'user_campus' => ['required'],
			'password' => ['required', 'confirmed', 'min:8','regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
	   		'password_confirmation' => ['required'],
   	]);

	    $users = \App\users::create([
			'username' => request('username'),
			'email' => request('email'),
			'password' => bcrypt(request('password')),
			'user_campus' => request('user_campus'),
	]);

		flash("Vous vous êtes bien inscrit")->success();
		return redirect('/connection');
	}	


	public function voirformulaire () // affiche le formulaire d'inscription

		{
	    return view('utilisateur.adduser');
		}

}