@extends('layout')

@section('contenu')

 <form method="post">
					<p>
						{{ csrf_field() }}
					<p> Entrez votre e-mail <input class="form" name="email" type="text"  placeholder="exemple@exemple.ex"/> </p>
						 @if($errors->has('email'))
							<p>{{ $errors->first('email') }} </p>
						 @endif
						
					<p> Entrez votre password <input class="form" name="password" type="password"    placeholder="***********"/> </p>
						@if($errors->has('password'))
							<p>{{ $errors->first('password') }} </p>
						@endif 

					<input type="submit" value="Connection" style="color: black;" />
					</p>
				</form>

@endsection