<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class liste extends Controller


{
	public function ShowAllProducts () // Affiche tout les produits dans une liste
	{
		$products = \DB::table('products')->get();
	    return view('products.ProductList', compact('products'));
	}

	 public function ShowOneProduct ($id) // Affiche tout les produits un par un par $id
	 {
		$products = \DB::table('products')->find($id);
		return view('products.ShowProduct', compact('products'));

	}

	public function ShowAllEvents () // Affiche tout les events dans une liste
	{
		$events = \DB::table('events')->get();
	    return view('events.EventList', compact('events'));
	}

	 public function ShowOneEvent($id) // Affiche tout les events un par un par $id
	 {
		$events = \DB::table('events')->find($id);
		return view('events.ShowEvent', compact('events'));
	}
	 public function voirboxidea() // Affiche la boîte à idée dans une liste si on est connecté
	{
		if (auth()->guest())
    		{
                flash("Vous devez être connecté pour voir cette page.")->error();
    			return redirect('/connection');
    			
    		}
    	$events = \DB::table('events')->get();
	    return view('events.eventidea', compact('events'));
    	
	}

}