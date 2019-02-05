@extends('layout')

@section('contenu')

<h1> Voici votre compte @auth <?php $user = Auth::user();  echo $user->username; ?> @endauth  </h1>

<a href="/deconnexion">Déconnexion</a>

			    <form method="post" action="modification-mot-de-passe">
				<p> 	{{ csrf_field() }}
					<p> Entrez votre nouveau mot de passe <input class="form" name="password" type="password" placeholder="*********"/> </p>
						@if($errors->has('password'))
							<p>{{ $errors->first('password') }} </p>
						@endif

					<p> Confirmez votre nouveau mot de passe <input class="form" name="password_confirmation" type="password" placeholder="*********"/> </p>
						@if($errors->has('password_confirmation'))
							<p>{{ $errors->first('password_confirmation') }} </p>
						@endif

						<p> <input type="submit" value="Modifier" style="color: black;" /> </p>
				</form> </br>
				<form method="post" action="uploadimg" enctype="multipart/form-data">
						{{ csrf_field() }}
					<span> Choisissez votre avatar <input type="file" name="avatar">   </span>
					<span> <input type="submit" value="Sauvegarder mon avatar" style="color: black;" />

    			</p> </br>

				</form>
<?php switch ( $oui = $user->role )
				{
					case '2': $oui = "Salarié"; break;
					case '3': $oui = "Membre du BDE / Admin" ; break;
					default : $oui = "Etudiant"; break;
				}
								

		
		echo "<p>   Vous êtes ".$oui."  </p>"; ?>
			  <p>   Vous êtes de {{ $user->user_campus }}</p>
	
		
  	


}
@endsection