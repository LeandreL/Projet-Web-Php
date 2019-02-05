@extends('layout')

@section('contenu')

<!-- Définitions des variables nécéssaires si c'est un utilisateur connecté -->

			<?php	if(auth()->check())
			{
					$id = $events->id;
		 			$pic = $events->event_pic;
		 			$user = Auth::user()->id;   
		 	
// Affichage d'une table qui va permettre d'afficher les participants de l'évènement 
		 	$db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
	 				
	 				$participant = $db->query("SELECT username FROM participation INNER JOIN users ON participation.id_user = users.id WHERE id_events=".$id." AND participation=1"); } ?>
	 		
<!-- Début de la page qui affiche un évènement unique -->

	<h1>{{ $events->event_name }}</h1>
		<h2>{{ $events->event_type }}</h2>
		<p> <img src="/storage/{{ $events->event_pic }}" alt="photo" width="256" height="256" style="margin: 0 20px 0 0;"> </p>

			<p>
			 Cet évènement aura lieu le <span class="alert"> {{ $events->event_date }} </span>

			 
			 @if(auth()->check())
				<p class="col-lg-4 col-md-6 col-xs-12">Les participants sont :
		
<!-- A l'aide de la table stocké dans $participant j'affiche les différents participant -->
											 <?php 	while ($nom = $participant->fetch())
			 										{
			 										echo $nom['username'].", ";
			 										} ?> </p>
			@endif		




<!-- Partie des checkboxs qui vont permettre de s'inscire ou de se désiscrire très facilement d'un évènement -->

<?php		 	if(auth()->check())
				{
				$db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');
	 				
	 				$participe = $db->query("SELECT participation FROM participation WHERE id_user= ".$user." AND id_events = ".$id);
					$resimg=$participe->fetch();
						$participation=$resimg['participation'];
						$participation2= $participation; ?>

					 		@if($participation == 0 OR $participation == NULL) <!-- Si l'utilisateur n'as pas encore renseigné sont choix ou qu'il s'était déjà désinscrit affiche la box participation -->

					 			 <p> 	<form method="post" action="/participation">
					 			{{ csrf_field() }}

						 							 <input  name="id_events" type="hidden" value="{{ $id }}">
								  					 <input  name="id_user" type="hidden" value="{{ $user }}">
								  					 <input  name="participation2" type="hidden" value="{{ $participation2 }}">
						 		Je veux participer : <input type="checkbox" name="participation" value="1">
						 							 <input type="submit" value="Valider"> </form></p>

							@else <!-- Permet de se desiscrire si l'utilisateur était déjà inscrit -->

					 			<p> 	<form method="post" action="/participation">
					 			{{ csrf_field() }}

							 							 <input  name="id_events" type="hidden" value="{{ $id }}">
									  					 <input  name="id_user" type="hidden" value="{{ $user }}">
									  					 <input  name="participation2" type="hidden" value="{{ $participation2 }}">
							 	Je veux me désinscrire : <input type="checkbox" name="participation" value="0">
							 							 <input type="submit" value="Valider"> </form></p>
			 				@endif
			 	}



				<span class="mini">Evènement ajouté le {{ $events->created_at }}</span>
			</p>

<!-- Partie commentaire -->

		 		@if(auth()->check())
		 		 <!-- Si l'utilisateur est connecté alors il voit le formulaire pour envoyer un commentaire --> 
		 		 <form method="post" action="/ajoutcom">
		 		 	{{ csrf_field() }}
					    		<input  name="id_events" type="hidden" value="{{ $id }}">

					    		<input  name="id_user" type="hidden" value="{{ $user }}">

									<textarea name="commentary"  cols="30" rows="4">Ajouter un commentaire</textarea>

								<input type="submit" value="Valider" style="color: black;" />';
				@endif

			
<!-- Affiche tout les commentaires sur cette évènement -->	
<?php				$idevent = $events->id;

					 $db= new PDO('mysql:host=localhost;dbname=site;charset=utf8', 'root', '');

						 $result = $db->query("SELECT username, avatarurl, commentary FROM comments INNER JOIN users ON comments.id_user = users.id WHERE id_events= ".$idevent);
							while ($resimg=$result->fetch())
							{
								// Certain utilisateur n'ont peut-être pas d'avatar donc on choisi d'afficher une image neutre seulement si il n'en n'ont pas
								
									if ($resimg['avatarurl'] !== '0') 
									{
									echo "<p><img src=/storage/".$resimg['avatarurl']." height='50' width='50'> ".$resimg['username']." à dit : </br>".$resimg['commentary']."</p>";
									}
										else
										{
										echo "<p><img src=/storage/avatars/avatar.jpg height='50' width='50'> ".$resimg['username']." à dit : </br>".$resimg['commentary']."</p>";
										} 
							}


}		?>			 
@endsection
