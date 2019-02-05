<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;

 
class event extends Controller
{
   	public function ajouterproduit() // Récupère et stock les données des évènements dans la base de donnée
	{

		request()->validate([
			'event_pic'  => ['required', 'image'], 
			'event_name' => ['required', 'max:64'],
			'event_type' => ['required', 'max:32'],
			'event_date' => ['required', 'max:11'],
			'event_cat'  => ['required', Rule::in(['1', '2'])],
	   	]);

		$path = request('event_pic')->store('event_pic', 'public');

	    $events = \App\events::create([
	    	'event_pic' => $path,
			'event_name' => request('event_name'),
			'event_type' => request('event_type'),
			'event_date' => request('event_date'),
			'event_cat'	 => request('event_cat'),
		]);

	    flash("Votre évènement à bien été ajouté")->success();
		return redirect('/EventList');
	}	


	public function voirformulaire () // Si l'utilisateur est connecté et que c'est un admin alors je le redirige sur la page d'ajout des évènements
	{
		if (auth()->check())
    		{          
			$user = Auth::user(); 
			$oui = $user->role;

			if ( 3 !== $oui )
				{
					flash("Vous n'avez pas accès à cette page")->error();
					return redirect('/');
				}

					else
					{
						$events = \DB::table('events')->get();
						return view('events.addevent', compact('events'));
					}
			}
		else
		{
			 flash("Vous devez être connecté pour voir cette page.")->error();
    		 return redirect('/connection');
		}
	}


	public function voirsendidea() // Si l'utilisateur est connecté envoie la page de la boîte à idée sinon redirige sur la page de connection
	{
		if (auth()->guest())
    		{
                flash("Vous devez être connecté pour voir cette page.")->error();
    			return redirect('/connection');
    			
    		}
    	return view('events.sendidea');
	}

	public function sendidea() // Si l'utilisateur est connecté, les données de la proposition sont stockées dans la bdd
	{
		if (auth()->guest())
    		{
                flash("Vous devez être connecté pour voir cette page.")->error();
    			return redirect('/connection');
    			
    		}
		request()->validate([
			'event_pic'  => ['required', 'image'],
			'event_name' => ['required', 'max:64'],
			'event_type' => ['required', 'max:32'],
			'event_date' => ['required', 'max:11'],
	   	]);

	   	$path = request('event_pic')->store('event_pic', 'public');
	
	    $events = \App\events::create([
	    	'event_pic' => $path,
			'event_name' => request('event_name'),
			'event_type' => request('event_type'),
			'event_date' => request('event_date'),
		]);	

	    flash("Votre évènement à bien été ajouté")->success();
		return view('welcome');
	}

	public function ajoutcom() // Si l'utilisateur est connecté permet de stocker un nouveau commentaire dans la bdd
	{
		if (auth()->guest())
    		{
                flash("Vous devez être connecté pour voir cette page.")->error();
    			return redirect('/connection');
    			
    		}
		request()->validate([
			'commentary' => ['required', 'max:256'] ]);

		 $events = \App\comments::create([
		 	'id_user' => request('id_user'),
		 	'id_events' => request('id_events'),
			'commentary' => request('commentary') ]);

		 flash("Votre commentaire à bien été ajouté");
		 return redirect('EventList');
	}

	public function participation() // Fonction qui permet de gérer les participation, dans un premier temps je vérifie si l'utilisateur est connecté
	{
		if (auth()->guest())
    		{
                flash("Vous devez être connecté pour voir cette page.")->error();
    			return redirect('/connection');
    			
    		}

    		$oui = request('participation2');

    	
		    	if( $oui == NULL)		// Si la personne n'a pas encore vu l'évènement alors la valeur de sa participation dans la bdd sera NULL et il faudra donc crée un nouvel enregistrement
		    	{
		    		
				   $events = \App\participation::create([
				   		'id_user' => request('id_user'),
				 		'id_events' => request('id_events'),
						'participation' => '1',
					 ]);	 
		    	

				flash("Votre participation à bien été prise en compte");
				return redirect('/EventList');
				}



				elseif( $oui == 1)	// Si la personne était déjà inscrite alors la valeur de sa participation sera de 1, ces personnes seront desinscrites et la valeur de la participation prendra 0
				{
				$events = \DB::table('participation')
						->where('id_user', request('id_user'))
						->where('id_events', request('id_events'))
						->update(['participation' => '0' ]);			 
				

				flash("Votre désinscription à bien été prise en compte");
				return redirect('/EventList');
				}



				elseif( $oui == 0 ) // Si cette personne ne voulait pas participer à cette évènement elle peut revenir sur sa décision et s'y réinscrire à nouveau 
				{
				$events = \DB::table('participation')
						->where('id_user', request('id_user'))
						->where('id_events', request('id_events'))
						->update(['participation' => '1' ]);
				

				flash("Votre participation à bien été prise en compte");
				return redirect('/EventList/article');
				}
	}

}

