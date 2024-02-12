@extends('layout')

@section('content')

    @if (session('loggedIn'))
    <h3>Welcome, {{session('name')}}</h3><br>  
    @endif

    <h1>Home Page</h1>
    
@endsection
