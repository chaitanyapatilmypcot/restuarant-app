@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center m-4">Register</h1>
    </div>

   


    <div class="col-sm-6 container">
        
        

        <form method="POST" action="/register">

            @csrf

            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Username</label>
              <input type="text" class="form-control" id="name" name="username">
              <span style="color: red">@error('username'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span style="color: red">@error('password'){{$message}}@enderror</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/login" class="btn btn-outline-secondary">Log In</a>

          </form>

    </div>
    
@endsection