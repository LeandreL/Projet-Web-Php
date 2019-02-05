@extends('layout')

@section('contenu')
			    <form method="post" enctype="multipart/form-data">
					<p>
						{{ csrf_field() }}
					<p> Entrez le nom de l'article <input class="form" name="product_name" type="text"    placeholder="Nom de l'article"/> </p>
						 @if($errors->has('product_name'))
							<p>{{ $errors->first('product_name') }} </p>
						 @endif
						
					<p> Entrez la catégorie <input class="form" name="product_type" type="text"    placeholder="Catégorie"/> </p>
						@if($errors->has('product_type'))
							<p>{{ $errors->first('product_type') }} </p>
						@endif  

					<p> Entrez le prix de l'article <input class="form" name="product_price" type="text" placeholder="Prix en €"/> </p>
						@if($errors->has('product_price'))
							<p>{{ $errors->first('product_price') }} </p>
						@endif     
					<p>  Choisissez votre image pour le produit <input type="file" name="product_pic"> </p>
						@if($errors->has('product_pic'))
							<p>{{ $errors->first('product_pic') }} </p>
	 					@endif 

					<input type="submit" value="Soumettre mon article" style="color: black;" />
					</p>
				</form>
@endsection