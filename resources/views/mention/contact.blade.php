@extends('layout')

@section('contenu')
<h1 style="text-align:center"> Contactez nous !</h1>
<div style="margin: 10px 500px 20px">
	<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select Problem</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Problèmes boutiques</option>
      <option>Questions événements </option>
      <option>Autres ...</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
	</form>
</div>
	

@endsection