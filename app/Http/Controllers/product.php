<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class product extends Controller
{
	public function ajouterproduit() // Récupère et stock les données des produits dans la base de donnée
		{
			request()->validate([
				'product_pic'  => ['required', 'image'], 
				'product_name' => ['required', 'max:32'],
				'product_type' => ['required', 'max:32'],
				'product_price' => ['required',  'max:3'],
			]);

			$path = request('product_pic')->store('product_pic', 'public');

		    $products = \App\products::create([
		    	'product_pic' => $path,
				'product_name' => request('product_name'),
				'product_type' => request('product_type'),
				'product_price' => request('product_price'),
			]);
				flash("Votre produit à bien été ajouté")->success();
				return redirect('/ProductList');
		}		

	
	public function voirformulaire () // Si l'utilisateur est connecté et que c'est un admin alors je le redirige sur la page d'ajout des produits
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
							return view('products.addproduct');
				}
			else
			{
				flash("Vous n'avez pas accès à cette page")->error();
				return redirect('/connection');
			}


			

		}

}




