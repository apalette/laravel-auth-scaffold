@extends('front.main')
@section('title', 'Mot de passe oublié')

@section('page_content')
<div class="panel-wrapper">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title">Mot de passe oublié</h1>
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
			<p>Merci d'entrer votre adresse e-mail afin de ré-initialiser votre mot de passe.</p>
    		<form method="post">
    			{!! csrf_field() !!}
				<div class="form-group">
    				<label for="email">E-mail</label>
    				<input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" maxlength="255" required>
  				</div>
			    <div class="text-center">
			        <button type="submit" class="btn btn-primary">Valider</button>
			    </div>
    		</form>
    		<div></div>
  		</div>
	</div>
	<div class="text-right"><a href="{{url('/connexion')}}">Me connecter</a></div>
</div>
@endsection