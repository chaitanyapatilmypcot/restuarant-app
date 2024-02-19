{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script> --}}
@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center m-4">Add Employee Shift</h1>
    </div>




    <div class="col-sm-6 container">

        @if (session('shift_allocate'))
            <p class="alert alert-success" id="myAlert">{{ session('shift_allocate') }} has allocated shift!</p>
        @endif

        <form method="POST" action="/add_emp">

            @csrf

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                <span style="color: red">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                <span style="color: red">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            

            {{-- <div class="mb-3 form-group">
                <label for="restoImage" class="form-label">Upload Image</label>
                <input type="file" name="file" class="form-control form-control-sm" id="restoImage"> 
                <span style="color: red">@error('file'){{$message}}@enderror</span>
            </div> --}}

            {{-- Drop Down showing restuarant list --}}
            <div class="mb-3">
                <label for="resto_list" class="form-label">Alloted Shift</label>
                <select name="restaurant_id" id="resto_list" class="form-select">
                    <option value="Select"  selected>Select Restaurant</option>
                    @foreach ($data as $item)
                        <option value="{{$item['id']}}" name="restaurant_id">{{$item['name']}} </option>
                    @endforeach
                    
                </select>
                <span style="color: red">
                    @error('restaurant')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            {{-- <input type="hidden" name="user_id" value="{{$uid}}"> --}}

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/list" class="btn btn-outline-secondary">Go back</a>

        </form>


    </div>
@endsection
