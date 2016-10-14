@extends('front.main')
@section('title', 'Vérification')

@section('page_content')
@if ($user)
<div class="alert alert-success" role="alert">
	Votre compte a été activé&nbsp;! Vous pouvez maintenant vous <a href="{{url('/connexion')}}">connecter</a>.
</div>
@else
<div class="alert alert-danger" role="alert">
	Ce lien n'est pas valide.
</div>
@endif
@endsection