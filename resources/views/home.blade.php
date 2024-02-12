@extends('layout')

@section('content')

    @if (session('loggedIn'))

    @php($uid = session('name')['id'])
    
    <h3> Welcome, {{session('name')['username']}}</h3><br>  
    @endif
    
    <h1>Home Page</h1>
    
    
@endsection

{{-- <?php $id = session('name')['id']; print_r($id); exit; ?> --}}
