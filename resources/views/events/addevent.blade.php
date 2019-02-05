@extends('layout')

@section('contenu')
 
			    <form method="post" enctype="multipart/form-data"> <!-- Formulaire d'envoie des nouveaux évènements, affichage des erreurs si il y en as -->
					<p>
						{{ csrf_field() }}
					<p> Entrez le nom de l'évènement <input class="form" name="event_name" type="text" placeholder="Nom de l'évènement"></p>
						@if($errors->has('event_name'))
							<p>{{ $errors->first('event_name') }} </p>
						@endif
						
					<p> Entrez la catégorie <input class="form" name="event_type" type="text" placeholder="Catégorie"/> </p>
						@if($errors->has('event_type'))
							<p>{{ $errors->first('event_type') }} </p>
						@endif 

					<p> Entrez la date de l'évènement <input class="form" name="event_date" type="text" placeholder="Oui"/> </p>
						@if($errors->has('event_date'))
							<p>{{ $errors->first('event_date') }} </p>
						@endif 

					<p> Ajouté en tant qu'évènement définitif ? <input type="checkbox" name="event_cat" value="2"> </p>

					<p> Ajouté en tant qu'idée ? <input type="checkbox" name="event_cat" value="1"> </p>

					<p>  Choisissez votre image pour l'évènement <input type="file" name="event_pic"> </p>
						@if($errors->has('event_pic'))
							<p>{{ $errors->first('event_pic') }} </p>
						@endif 
 


					<input type="submit" value="Valider" style="color: black;" />
					</p>
				</form>


				@foreach ($events as $evenement) <!-- J'affiche chaque évènement qui n'est qu'une idée pour que les admins puisse crée des evenement en fonction -->
			@if ($evenement->event_cat === 1)
		<div class="event" style="padding-left: 540px;">
			<table style="width: 60%; border-bottom: 2px solid #00264d;">
			<tr>
				<td rowspan="3" ><img src="/storage/{{ $evenement->event_pic }}" alt="photo" width="256" height="256" style="margin: 0 20px 0 0;"></td>
				<td><a class="col-lg-4 col-md-6 col-sm-12 article" href="/EventList/event{{ $evenement->id }}" style="font-size: 48px;">{{ $evenement->event_name }}</a></td>
			</tr>
			<tr>
				<td><p style="font-size: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></td>
			</tr>
			<tr>
				<td>Date : {{ $evenement->event_date }}</td>
			</tr>
			</table>
		</div>
			@endif
		 @endforeach
@endsection