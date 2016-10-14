@extends('layout')

@section('css')
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
            	<li><a href="{{url('/deconnexion')}}">Déconnexion</a></li>
            </ul>
		</div>
	</div>
</nav>

<!-- Content -->
<div class="container page-container">
	@yield('page_content')
</div>
@endsection