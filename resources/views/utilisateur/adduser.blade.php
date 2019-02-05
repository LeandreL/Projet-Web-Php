@extends('layout')

@section('contenu')


			    <form method="post">
					<p>
						{{ csrf_field() }}
					<p> Entrez votre Pseudo <input class="form" name="username" type="text"    placeholder="Anto_ow"/> </p>
						 @if($errors->has('username'))
							<p>{{ $errors->first('username') }} </p>
						 @endif
						
					<p> Entrez votre e-mail <input class="form" name="email" type="text"    placeholder="exemple@exemple.ex"/> </p>
						@if($errors->has('email'))
							<p>{{ $errors->first('email') }} </p>
						@endif 

					<p> Selectionnez votre campus   <select name="user_campus">
														<option value="Strasbourg">Strasbourg</option>
														<option value="Pau">Pau</option>
														<option value="Nice">Nice</option>
														<option value="Brest">Brest</option>
														<option value="Rouen">Rouen</option>
														<option value="Nancy">Nancy</option>
														<option value="Bordeaux">Bordeau</option>
												    </select> </p>
						@if($errors->has('user_campus'))
							<p>{{ $errors->first('user_campus') }} </p>
						@endif 

					<p> Entrez votre mot de passe <input class="form" name="password" type="password" placeholder="*********"/> </p>
						@if($errors->has('password'))
							<p>{{ $errors->first('password') }} </p>
						@endif      
					<p> Confirmez votre mot de passe <input class="form" name="password_confirmation" type="password" placeholder="*********"/> </p>
						@if($errors->has('password_confirmation'))
							<p>{{ $errors->first('password_confirmation') }} </p>
						@endif


		<input type="checkbox" value="Bonjour" name="condition" id="condition">J'accepte les conditions du règlement concernant le stockage de mes données personnelles et de mon droit à l'oubli  <p>Pour plus d'informations, voir les <a href="/mentionslegales">mentions légales</a></br>Nous utilisons des cookies sur ce site. En poursuivant votre navigation vous acceptez l'utilisation de ces cookies.</p></br>




					<input type="submit" value="Valider mon inscription" style="color: black;" />
					</p>
				</form>

				<p> Vous avez déjà un compte ? <a href="/connection">Connectez-vous</a></p>

@endsection