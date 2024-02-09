@extends('layout')

@section('content')
    <div class="container ">
        <h1 class="text-center m-4">Log In</h1>
    </div>

   


    <div class="col-sm-6 container">
        
        

        <form method="POST" action="/add">

            @csrf

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>

            {{-- or username (unique) login should be enable --}}
            
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <span style="color: red">@error('password'){{$message}}@enderror</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Log In</button>
            <a href="/register" class="btn btn-outline-secondary">Sign up</a>

          </form>

    </div>
    
@endsection