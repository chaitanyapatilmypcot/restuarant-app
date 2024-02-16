@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Modify the details of restaurant</h1>
    </div>

    


    <div class="col-sm-6 container">

        @if (session('user'))
        
        <p class="alert alert-success" id="myAlert">{{session('user')}}'s data has been updated successfully</p>
         
        @endif

        <form method="POST" action="/edit" enctype="multipart/form-data">
            <input type="hidden" name="id" value="{{$data['id']}}">
            @csrf

            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$data['name']}}">
              <span style="color: red">@error('name'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$data['email']}}">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" id="email" name="address" value="{{$data['address']}}">
                <span style="color: red">@error('address'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="restoImage" class="form-label">Change Image</label>
                <input type="file" name="file" class="form-control form-control-sm" id="restoImage">
                <img src="{{ asset('img/' . $data['file'] )}}" class="img-fluid rounded mt-2" alt="{{$data['file']}}">{{$data['file']}}
                <span style="color: red">@error('file'){{$message}}@enderror</span>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/list" class="btn btn-outline-secondary">Go back</a>

          </form>

    </div>
    
@endsection