@extends('layout')

@section('contenu')


			    <form method="post" enctype="multipart/form-data"> <!-- Formulaire des idées d'évènements -->
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

					<p>  Choisissez votre image pour l'évènement <input type="file" name="event_pic"> </p>
						@if($errors->has('event_pic'))
							<p>{{ $errors->first('event_pic') }} </p>
					    @endif

					<input type="submit" value="Valider" style="color: black;" />
					</p>
				</form>
@endsection