<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompteController extends Controller
{
    public function accueil () // Si je suis connecté affiche l'accueil du compte
    {
    	if (auth()->check())
    		{
               return view('utilisateur.moncompte', compact('users')); 
    		}
    	
        flash("Vous devez être connecté pour voir cette page.")->error();
        return redirect('/connection'); 
    }

    public function deconnexion()  // si je suis connecté me deconnecte sinon me renvoie sur la page de connection
            {
                if (auth()->check())
                {
                auth()->logout();
                flash("Vous êtes maintenant déconnecté")->success();
                return redirect('/');
                }

                    else         
                    {
                    flash("Vous devez être connecté pour voir cette page.")->error();
                    return redirect('/connection');
                    }
            }

    public function modificationMotDePasse() // Si je suis connecté change le mot de passe et redirige sur la page d'accueil du compte, sinon sur la page de connection
            {
               if (auth()->check())
                {
                    request()->validate([
                        'password' => ['required', 'confirmed', 'min:8'],
                        'password_confirmation' => ['required'],
                    ]);


                    auth()->user()->update([
                        'password' => bcrypt(request('password')),
                    ]);

                    flash("Votre mot de passe à bien été mis à jour.")->success();

                    return redirect('/moncompte');
                }

                    else
                    {
                    flash("Vous devez être connecté pour voir cette page.")->error();
                    return redirect('/connection');
                    }
            }

    public function uploadimage() // Si je suis connecté upload la nouvelle image de profil et stock son lien dans la bdd, sinon je suis renvoyé sur la page de connection
        {
            if(auth()->check())
            {
                request()->validate([
                     'avatar' => ['required', 'image'], ]);

            $path = request('avatar')->store('avatars', 'public');

                auth()->user()->update([
                    'avatarurl' => $path ]);

                return redirect('/moncompte');
            }

                else
                {
                flash("Votre avatar à été modifié")->success();
                return redirect('/moncompte');
                }  
        } 

    public function cancel() // fonction de redirection pour les pages auquelles je ne peux pas accéder de règle général
        {
            flash("Vous ne pouvez pas acceder à cette page")->error();
            return redirect('/');
        }
        
}


