@extends('layout')

@section('contenu')

	<div class="title"> BDE Evenement 
		<p><a href="/eventidea">Boîte à idée</a></p>
	</div>
	
	<div>
		@foreach ($events as $evenement)	<!-- Afficher tout les évènement validés et permettent d'aller checker plus d'info en cliquant -->
			@if ($evenement->event_cat === 2)
		<div class="event" style="padding-left: 540px;">
			<table style="width: 60%; border-bottom: 2px solid #00264d;">
			<tr>
				<td rowspan="3" ><img src="storage/{{ $evenement->event_pic }}" alt="photo" width="256" height="256" style="margin: 0 20px 0 0;"></td>
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
		</div>
	</div>
@endsection 