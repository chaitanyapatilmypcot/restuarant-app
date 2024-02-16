@extends('layout')

@section('content')
    <div class="container ">
        <h1 class="text-center m-4">Log In</h1>
    </div>

   


    <div class="col-sm-6 container">
        
        @if (session('registered'))
            <p class="alert alert-success" id="myAlert">{{session('registered')}} registered successfully! Kindly Login</p> <br>
        @endif

        @if (session('Error'))
            <p class="alert alert-danger" id="myAlert">{{session('Error')}}</p><br>
        @endif

        @if (session('logout'))
            <p class="alert alert-warning" id="myAlert">{{session('logout')}}</p><br>
        @endif

        @if (session('unauthorized'))
            <p class="alert alert-warning" id="myAlert">{{session('unauthorized')}}</p><br>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>

            {{-- or username (unique) login should be enable --}}
            
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}"> 
                {{-- add visible password option in future --}}
                <span style="color: red">@error('password'){{$message}}@enderror</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Log In</button>
            <a href="/register" class="btn btn-outline-secondary">Sign up</a>

          </form>

    </div>
    
@endsection