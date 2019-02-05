@extends('layout')

@section('contenu')

	<div class="title"> BDE e-shop 
	</div>
	<div style="height: 1000px;">
		<ul>
			<li><input id="search" list="category" placeholder="Trouver un article" type="text" autocomplete="on"> <!-- Barre de recherche avec autocomplétion -->
					<datalist id="category">
						<select>
							<option value="Caleçon"></option>
							<option value="Stylo"></option>
							<option value="Sac en jute"></option>
							<option value="Pantalon"></option>
							<option value="Décapsuleur"></option>
							<option value="Imagier"></option>
							<option value="Chaussette"></option>
							<option value="Veste"></option>
						</select>
					</datalist>
					<select name="category"> <!-- Liste déroulante pour choisir les catégories -->
						<option value="Tout"><button class="btn" onclick="filterSelection('all')">Toutes les catégories</button></option>
						<option value="Loisir"><button class="btn" onclick="filterSelection('Loisir')">Loisir</button></option>
						<option value="Habillage"><button class="btn" onclick="filterselection('Habillage')">Habillage</button></option>
						<option value="Goodies"><button class="btn" onclick="filterSelection('Goodies')">Goodies</option>
					</select>
			<select name="price"> <!-- Liste déroulante pour choisir les marges de prix -->
				<option value="All"><button class="btn" onclick="filterSelection('all')">Tous les prix</button></option>
				<option value="<10"><button class="btn" onclick="filterSelection('<10')">Moins de 10€</button></option>
				<option value="10-100"><button class="btn" onclick="filterSelection('10-100')">Entre 10 et 100€</button></option>
				<option value=">100"><button class="btn" onclick="filterSelection('>100')">Plus de 100€</button></option>
			</select>
			</li>
		<ul>
		@foreach ($products as $produit)  <!-- Etiquette affichant un article -->
			<div class="card col-lg-3 col-md-6 col-sm-12">
				<div class="filterDiv {{$produit->product_type}}">
					<a href="/ProductList/article{{ $produit->id }}"><img src="storage/{{ $produit->product_pic}}" alt="Image non disponible" style="width:256px; height: 256px;">
					<h1>{{ $produit->product_name }}</h1></a>
					<p class="price">{{ $produit->product_price }}€</p>

				</div>
			</div>
		@endforeach
	</div>
	<script src="/js/autocomplete.js"></script>			<!-- Pour cette page on appelle des scripts pour l'autocomplétion et les filtrages -->
	<script src="/js/filterCategory.js"></script>

@endsection