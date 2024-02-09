@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center m-4">Add Restaurants</h1>
    </div>

   


    <div class="col-sm-6 container">
        
        @if (session('user'))
            <p class="alert alert-success" id="myAlert">{{session('user')}}'s data has been added successfully</p>
        @endif

        <form method="POST" action="/add">

            @csrf

            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
              <span style="color: red">@error('name'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="email" name="address">
                <span style="color: red">@error('address'){{$message}}@enderror</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/list" class="btn btn-outline-secondary">Go back</a>

          </form>

    </div>
    
@endsection