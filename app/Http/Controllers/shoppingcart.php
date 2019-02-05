<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\validationachat;
use App\Mail\confirmationachat;
use Auth;
use PDO;


class shoppingcart extends Controller
{
    public function addtocart() // Si l'utilisateur est connecté crée un nouvel enregistrement dans le panier avec son produit
    {
        if (auth()->guest())
            {
                flash("Vous devez être connecté pour voir cette page.")->error();
                return redirect('/connection');
                
            }
            	$products = \App\shoppingcart::create([
            		'product_id' => request('produ'),
            		'id_user' => request('useru'),  ]);

            	flash("Votre produit à bien été ajouté au panier")->success(); 
            	return redirect('/ProductList');
    }

    public function showcart() // Si l'utilisateur est connecté affiche le panier de l'user
     {
        if (auth()->guest())
            {
                flash("Vous devez être connecté pour voir cette page.")->error();
                return redirect('/connection');
                
            }
        return view('products.shoppingcart');
     }

    public function emptycart() // Simple delete des enregistrement du panier de l'utilisateur concerné
    {
        if (auth()->guest())
            {
                flash("Vous devez être connecté pour voir cette page.")->error();
                return redirect('/connection');
                
            }

        $user = Auth::user()->id;

        $db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
        $result = $db->query("DELETE FROM shoppingcart WHERE id_user =".$user);

        return view('products.shoppingcart');
    }

    public function validcart() // Si l'utilisateur est connecté envoie un mail aux admins pour procéder à l'achat et un à l'étudiant pour avoir une pseudo facture de sa commande, puis on vide le panier pour éviter les duplicatas
    {
        if (auth()->guest())
            {
                flash("Vous devez être connecté pour voir cette page.")->error();
                return redirect('/connection');
                
            }
                 $db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
                 $result = $db->query("SELECT email FROM users WHERE role = 3");
                 while ($mailsalarie=$result->fetch())
                 {
                    Mail::to($mailsalarie['email'])->send(new validationachat);
                 }


                    $user = Auth::user()->id;
                    $mailuser = Auth::user()->email;

                         Mail::to($mailuser)->send(new confirmationachat);

                            $db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
                            $result = $db->query("DELETE FROM shoppingcart WHERE id_user =".$user);

                    flash("Votre commande à été soumise à un membre du BDE. Vous allez recevoir un mail");
                    return redirect('/');
            
    }
}
