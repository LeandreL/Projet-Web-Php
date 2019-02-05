@extends('layout')

@section('contenu')

<h1> Voici votre panier {{ Auth::user()->username }} </h1>

<?php			$prixttc = 0;
			$user = Auth::user()->id; 
			$db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
						$result = $db->query("SELECT product_name, product_price, COUNT(*) FROM shoppingcart INNER JOIN products ON shoppingcart.product_id = products.id GROUP BY product_id");
						while ($resimg=$result->fetch())
						{
						$prix = $resimg['COUNT(*)'] * $resimg['product_price'];
						echo $resimg['COUNT(*)']." ".$resimg['product_name']." pour : ".$prix."€ </br> ";
						$prix = $resimg['COUNT(*)'] * $resimg['product_price'];
						$prixttc = $prixttc + $prix;
						}
			if( 0 == $prixttc )	
			{
			echo "<h3>Votre panier est vide</h3>";
			}
		else
		{
		echo  "</br> Prix total : ".$prixttc." €</br>";
		}
	
 if(0 !== $prixttc )
	{ 
	echo '<p><a href="/emptycart" style="color: black;"> Vider mon panier </a></p>';
	echo '<p><a href="/validcart" style="color: black;"> Valider mes achats </a></p>';
	} 

?>

@endsection