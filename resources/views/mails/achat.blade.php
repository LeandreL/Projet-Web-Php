<!DOCTYPE html>
<html>
------ Ceci est un mail automatique, ne pas répondre svp ------ </br> </br>


Bonjour,

Un nouvel achat viens d'être effectuer par <?php echo Auth::user()->email ?>

La commande concerne :</br> <?php 
			$prixttc = 0;
			$db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
						$result = $db->query("SELECT product_name, product_price, COUNT(*) FROM shoppingcart INNER JOIN products ON shoppingcart.product_id = products.id GROUP BY product_id");
						while ($resimg=$result->fetch())
						{
						$prix = $resimg['COUNT(*)'] * $resimg['product_price'];
						echo $resimg['COUNT(*)']." ".$resimg['product_name']." pour : ".$prix."€ . </br> ";
						$prix = $resimg['COUNT(*)'] * $resimg['product_price'];
						$prixttc = $prixttc + $prix;
						} 
						echo "Pour un total de ".$prixttc."€";
						?>

Veuillez contacter l'acheteur, </br>
Bonne journée. </br>
</html>