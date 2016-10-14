@extends('layout')

@section('css')
<link href="{{url('assets/app/front/css/main.css')}}" rel="stylesheet">
@yield('page_css')
@endsection

@section('js')
@yield('page_js')
@endsection

@section('content')
<!-- Static navbar -->
<nav class="navbar navbar-default">
	<div class="container-fluid">
    	<div class="navbar-header">
       		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            	<span class="sr-only">Menu</span>
              	<span class="icon-bar"></span>
              	<span class="icon-bar"></span>
              	<span class="icon-bar"></span>
            </button>
          	<a class="navbar-brand" href="{{url('/')}}">Projet</a>
		</div>
        <div id="navbar" class="navbar-collapse collapse">
        	<ul class="nav navbar-nav">
            	<li class="{{Request::is('/') ? ' active' : ''}}"><a href="{{url('/')}}">Accueil</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            	<li class="{{Request::is('connexion') ? ' active' : ''}}"><a href="{{url('/connexion')}}">Connexion</a></li>
              	<li class="{{Request::is('inscription') ? ' active' : ''}}"><a href="{{url('/inscription')}}">Inscription</a></li>
            </ul>
		</div>
	</div>
</nav>

<!-- Content -->
<div class="container page-container">
	@yield('page_content')
</div>
@endsection