@extends('front.main')
@section('title', 'Changement du mot de passe')

@section('page_content')
<div class="panel-wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Changement du mot de passe</h1>
		</div>
  		<div class="panel-body">
  			@if(session('message'))
			<div class="alert alert-success">
				<p>{{session('message')}}</p>
			</div>
			@endif
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
    		<form method="post" action="{{ url('/nouveau-mot-de-passe') }}">
    			{!! csrf_field() !!}
    			 <input type="hidden" name="token" value="{{ $token }}">
				<div class="form-group">
    				<label for="email">E-mail</label>
    				<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ $email or old('email') }}" maxlength="255" required>
  				</div>
  				<div class="form-group">
    				<label for="email">Mot de passe</label>
    				<input type="password" name="password" class="form-control" id="password" placeholder="Mot de passe" minlength="6" required>
    				<p class="help-block">6 caractères minimum</p>
  				</div>
  				<div class="form-group">
    				<label for="email">Confirmer le mot de passe</label>
    				<input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Confirmer le mot de passe" minlength="6" required>
    				<p class="help-block">6 caractères minimum</p>
  				</div>
			    <div class="text-center">
			        <button type="submit" class="btn btn-primary">Valider</button>
			    </div>
    		</form>
    		<div></div>
  		</div>
	</div>
</div>
@endsection