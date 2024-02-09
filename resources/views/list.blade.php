@extends('layout')

@section('content')

{{-- Search Functionality --}}
<div class="d-flex justify-content-center m-4"> <!-- Use flex utilities for centering -->
    <form class="d-flex col-sm-6 align-center" role="search" action="/search" method="POST">
        @csrf
      <input class="form-control me-2" type="search" placeholder="Search" name="search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>


@if (session('user')) 
    <p class="alert alert-danger" id="myAlert">{{session('user')}}'s data has been deleted successfuly</p>
@endif

@if (session('edit')) 
    <p class="alert alert-success" id="myAlert">{{session('edit')}}'s data has been updated successfuly</p>
@endif

<div class="table-responsive container mt-5 shadow p-3 mb-5 bg-body rounded">
    <table class="table table-hover">
        <thead class="table-dark shadow-sm p-3 mb-5 bg-body rounded">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
            </tr>
          
        </thead>

        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="col">{{$item['id']}}</th>
                <td scope="col">{{$item['name']}}</td>
                <td scope="col">{{$item['email']}}</td>
                <td scope="col">{{$item['address']}}</td>
                <td scope="col"> 
                    <a href="/delete/{{$item['id']}}"><i class="fa fa-trash m-2"></i></a>
                    <a href="/edit/{{$item['id']}}"><i class="fa fa-pencil-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
   
@endsection