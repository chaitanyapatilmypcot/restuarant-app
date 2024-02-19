@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">Modify the details of Employee Shift</h1>
    </div>

    


    <div class="col-sm-6 container">

        @if (session('emp_edit'))
        
        <p class="alert alert-success" id="myAlert">{{session('emp_edit')}}'s data has been updated successfully</p>
         
        @endif

        <form method="POST" action="/emp_edit">
            <input type="hidden" name="id" value="{{$empData['id']}}">
            @csrf

            <div class="mb-3 form-group">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{$empData['name']}}">
              <span style="color: red">@error('name'){{$message}}@enderror</span>
            </div>

            <div class="mb-3 form-group">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$empData['email']}}">
                <span style="color: red">@error('email'){{$message}}@enderror</span>
            </div>
            
            <div class="mb-3">
                <label for="resto_list" class="form-label">Alloted Shift</label>
                <select name="restaurant_id" id="resto_list" class="form-select">
                    <option value="Select"  selected disabled>Select Restaurant</option>
                    @foreach ($restoData as $item)
                        <option value="{{$item['id']}}" {{ $empData->restaurant_id == $item->id ? 'selected' : '' }} name="restaurant_id">{{$item['name']}} </option>
                    @endforeach
                    
                </select>
                <span style="color: red">
                    @error('restaurant')
                        {{ $message }}
                    @enderror
                </span>
            </div>
           
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/list" class="btn btn-outline-secondary">Go back</a>

          </form>

    </div>
    
@endsection