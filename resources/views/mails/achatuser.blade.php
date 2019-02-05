<!DOCTYPE html>
<html>
------ Ceci est un mail automatique, ne pas répondre svp ------ </br> </br>


Bonjour <?php echo Auth::user()->username; ?>,



Vous avez commandé : </br> <?php 
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


Vous allez être contacté par un membre du BDE pour la finalisation, </br>
Bonne journée </br>
BDE
</html>