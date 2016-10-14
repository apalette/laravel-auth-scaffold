@extends('front.main')
@section('title', 'Connexion')

@section('page_content')
<div class="panel-wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Connexion</h1>
		</div>
  		<div class="panel-body">
  			@if (count($errors) > 0)
		    <div class="alert alert-danger">
		    	@if (count($errors) == 1)
		    	<p>{{ $errors->first() }}</p>
		    	@else
		    	<p><strong>Le formulaire présente plusieurs erreurs&nbsp;:</strong></p>
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		        @endif
		    </div>
			@endif
    		<form method="post">
    			{!! csrf_field() !!}
				<div class="form-group">
    				<label for="email">E-mail</label>
    				<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" maxlength="255" required>
  				</div>
  				<div class="form-group">
    				<label for="password">Mot de passe</label>
    				<input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" minlength="6" required>
  				</div>
				 <div class="checkbox">
    				<label>
      					<input type="checkbox" name="remember"> Rester connecté(e)
    				</label>
  				</div>
			    <div class="text-center">
			        <button type="submit" class="btn btn-primary">Valider</button>
			    </div>
    		</form>
    		<div></div>
  		</div>
  		<div class="panel-footer">
  			<div class="text-right"><a href="{{url('/mot-de-passe')}}">J'ai oublié mon mot de passe</a></div>
  		</div>
	</div>
	<div class="text-right">Pas encore de compte&nbsp;? <a href="{{url('/inscription')}}">Inscrivez-vous</a></div>
</div>
@endsection