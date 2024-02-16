@extends('layout')

@section('content')

    @if (session('loggedIn'))

    @php($uid = session('name')['id'])
    
    <h3> Welcome, {{session('name')['username']}}</h3><br>  
    @endif
    
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($data as $index => $item)
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $index }}" @if ($index === 0) class="active" @endif aria-current="true" aria-label="{{ $item['name'] }}"></button>
            @endforeach
        </div>
        

        <div class="carousel-inner">
            @foreach ($data as $index => $item)
                <div class="carousel-item @if ($index === 0) active @endif" data-bs-interval="2000">
                    <img src="{{ asset('img/' . $item['file']) }}" class="d-block w-100" alt="{{ $item['file'] }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $item['name'] }}</h5>
                        <p>{{ $item['address'] }}</p>
                        <p>{{ $item['email'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
          

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true" style="color: white;"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true" style="color: white;"   ></span>
            <span class="visually-hidden">Next</span>
        </button>
      </div>
    
    
@endsection

{{-- <?php $id = session('name')['id']; print_r($id); exit; ?> --}}
