@extends('layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    .notification{
      position: fixed;
      top: 5em;
      right: 4em;
    }

    img {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 5px;
        width: 150px;
    }

    .w-5{
            display: none;
        }
</style>


{{-- Session messages --}}

@if (session('edit')) 
    <div class="notification" id="myAlert">
        <alert class="alert alert-success" role="alert">{{session('edit')}}'s data has been updated successfuly
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </alert>
    </div>
@endif

@if(session('user'))
    <div class="notification" id="myAlert">
        <alert class="alert alert-warning" role="alert">{{session('user')}}'s data has been deleted successfuly
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </alert>
    </div>
@endif

@if(session('login'))
    <div class="notification" id="myAlert">
        <alert class="alert alert-success" role="alert">{{session('name')}}{{session('login')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </alert>
    </div>
@endif

<div class="container ">
    <h1 class="text-center m-4">Employee Shifts Alloted</h1>
</div>


{{-- Search Functionality --}}
{{-- <div class="d-flex justify-content-center m-4"> <!-- Use flex utilities for centering -->
    <form class="d-flex col-sm-6 align-center" role="search">
        @csrf
      <input class="form-control me-2" type="search" placeholder="Search" name="search" id="searchItem">
      <button class="btn btn-outline-success" type="submit" id="search">Search</button>
    </form>
</div> --}}


<p id="searchLog" class="d-flex justify-content-center m-2"></p>

<div class="table-responsive container mt-5 shadow p-3 mb-5 bg-body rounded" >
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Restaurant Name</th>
                <th scope="col">Action</th>
            </tr>
          
        </thead>

        <tbody>
            @foreach ($data as $item)
            <tr>
                <th scope="col">{{$item['id']}}</th>
                <td scope="col">{{$item['name']}}</td>
                <td scope="col">{{$item['email']}}</td>
                <td scope="col">{{$item['restaurant']->name}}</td>
                <td scope="col"> 
                    <a href="/delete/{{$item['id']}}"><i class="fa fa-trash m-2"></i></a>
                    <a href="/edit/{{$item['id']}}"><i class="fa fa-pencil-square"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      
    {{-- Pagination --}}
    {{-- <div class="d-flex justify-content-center mt-2">
        {{ $data->links('vendor.pagination.bootstrap-4') }}
    </div> --}}
</div>

{{-- <script type="text/javascript">
    $(document).delegate('#search', 'click', function(event) {
        event.preventDefault();

        var name = $('#searchItem').val().trim();
        // console.log(name);

        if(name == null || name == "") {
            alert("Search Item is required");
            return;
        } else {
            $.ajax({
                type: "POST",
                url: "/search",
                data: { '_token': $('meta[name="csrf-token"]').attr('content'), 'search' : name },
                cache:false,
                success:function(response) {
                    renderRecords(response.data, name, response.totalRestaurantCount);
                },
                //  function loadRecords() {
                // $.getJSON(`http://127.0.0.1:8000/search?search=${name}`, function(json) {
                //     renderRecords(json);
                // });
                    
                error: function() {
                        alert('Error searching records');
                }
            });
        }
    });
        

        function renderRecords(records, name, totalRestoCount) {
            // console.log(records.length);
                $('tbody').empty();
                $('#searchLog').empty();

                records.forEach(item => {
                    const row = $('<tr>');      
                   
                    row.append('<th scope="col">' + item.id + '</th>');
                    row.append('<td scope="col">' + item.name + '</td>');
                    row.append('<td scope="col"><img src="{{ asset("img/' + item.file + '") }}" class="img-fluid rounded" alt="' + item.file + '"></td>');

                        //<img src="{{ asset('img/' . $item['file'] )}}" class="img-fluid rounded" alt="{{$item['file']}}">

                    row.append('<td scope="col">' + item.email + '</td>');
                    row.append('<td scope="col">' + item.address + '</td>');
                    row.append('<td scope="col"><a href="/delete/' + item.id + '"><i class="fa fa-trash m-2"></i></a><a href="/edit/' + item.id + '"><i class="fa fa-pencil-square"></i></a></td>');
                    $('tbody').append(row); 
                    
              
                });
                $('#searchLog').append('Search Results for "' + name + '" (' + (records.length) + ') found out of ' + totalRestoCount +'')
        }   
    

</script>   --}}
   
@endsection