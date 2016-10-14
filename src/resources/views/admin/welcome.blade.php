@extends('admin.main')
@section('title', 'Bienvenue')

@section('page_content')
Bonjour {{$user->first_name}} !
@endsection
