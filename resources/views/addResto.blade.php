@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center m-4">Add Restaurants</h1>
    </div>

   


    <div class="col-sm-6 container">
        
        @if (session('user'))
            <p class="alert alert-success" id="myAlert">{{session('user')}}'s data has been added successfully</p>
        @endif

        <form method="POST" action="/add" enctype="multipart/form-data">

            @csrf
            
            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
              <span style="color: red">@error('name'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="mb-3 form-group">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                <span style="color: red">@error('address'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="restoImage" class="form-label">Upload Image</label>
                <input type="file" name="file" class="form-control form-control-sm" id="restoImage" value="{{old('')}}"> 
                <span style="color: red">@error('file'){{$message}}@enderror</span>
            </div>

            {{-- <input type="hidden" name="user_id" value="{{$uid}}"> --}}
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/list" class="btn btn-outline-secondary">Go back</a>

          </form>
          

    </div>
    
@endsection