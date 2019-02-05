@extends('layout')

@section('contenu')

 <?php  $_SESSION["$products->product_name"]=$products->id; ?> 

	<h1>{{ $products->product_name }}</h1>
	<p> <img src="/storage/{{ $products->product_pic }}" alt="photo" width="256" height="256" style="margin: 0 20px 0 0;"> </p>
		<h2>{{ $products->product_type }}</h2>

			<p>
					Ce produit vaut <span class="alert"> {{ $products->product_price }} €</span> </br> </br>
					<p class="mini">Produit ajouté le {{ $products->created_at }}</p>

			@if(auth()->check())
				<form method="post" action="/addtocart">
					{{ csrf_field() }}
					<input  name="produ" type="hidden" value='{{ $_SESSION["$products->product_name"] }}'>
					<input  name="useru" type="hidden" value='<?php $user = Auth::user();  echo $user->id; ?>'>
					<input type="submit" value="Ajouter au panier" style="color: black;" />
				</form>
			@endif
			</p> 

@endsection