@extends('layouts.app')
@section('content')
    <div class="container my-4 table-bordered text-center">
        <h1 class="rest-name">{{ $restaurant-> name }}</h1>
        <div class="mt-3 h4">
            @foreach($restaurant->cuisines as $cuisine)
            <span class="badge badge-pill badge-light">{{ $cuisine-> name }}</span>
            @endforeach
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4 offset-md-1 text-center">
                @if ($restaurant->img)
                    <img class="img-show" src="{{ url( $restaurant->img) }}" alt="{{ $restaurant->name }}">
                    {{-- <img class="img-fluid" style="height:200px" src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}"> --}}
                @else 
                    <img class="img-fluid w-25 " src="{{ asset('images/restaurantplaceholder.png') }}" alt="{{ $restaurant->name }}">    
                @endif

            </div>
            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 offset-lg-1 spacer text-left rest-info">
                <h4>Numero di telefono: </h4>
                <h4>Posizione: </h4>
                <h4>Orario di apertura: </h4>
                <h4>Orario di chiusura: </h4>
                <h4>Prezzo di consegna: </h4>
            </div>
            <div class="col-xs-2 col-sm-8 col-md-4 col-lg-3 text-left rest-info px-0">
                <h4>{{ $restaurant->phone_number }}</h4>
                <h4>{{ $restaurant->location }}</h4>
                <h4>{{ $restaurant->opening_time }}</h4>
                <h4>{{ $restaurant->closure_time }}</h4>
                <h4>{{ $restaurant->price_shipping }}€</h4>
            </div>

            <div class="col-md-10 offset-md-1 mt-3 rest-description">
                {{ $restaurant-> description }}
            </div>
        </div>
        <div class="mt-3 mb-4">
            <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->id) }}"> Modifica</a>
            <a  class="btn btn-success ml-2" href="{{ route('admin.restaurants.index' ) }}">Elenco ristoranti</a>
            <a  class="btn btn-success ml-2" href="{{ route('admin.dishes.index', $restaurant -> id ) }}">Elenco piatti</a>
        </div>
    </div>
@endsection
