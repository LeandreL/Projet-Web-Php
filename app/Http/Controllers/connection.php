<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class connection extends Controller
{
	public function formulaire() // Envoie sur la page de connection
	{
		return view('utilisateur.connection');
	}

	public function traitement() // Traite les données et authentifie l'utilisateur si les données sont corrects. Je suis redirigé sur la page d'accueil du compte si c'est corrects sinon je renvoie sur la page précédentes avec les erreurs
	{
		request()->validate([
			'email' => ['required','email'],
			'password' => ['required'],
		]);

		$result = auth()->attempt([
			'email' => request('email'),
			'password' => request('password'),
		]);

	if ($result) 
		{	
			flash('Vous êtes maintenant connecté')->success();
			return redirect('/moncompte');
		}

		return back()->withInput()->withErrors([
			'email' => 'Vos identifiants sont incorrects',
		]);

	}
}
