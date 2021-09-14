@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <div class="d-flex align-items-center justify-content-between col-lg-11 pl-0">
            <h2 class="rest-name">{{ $restaurant-> name }}</h2>
            <a href="{{ route('admin.chartjs', $restaurant->id) }}" class="btn btn-orange">grafico ordini</a>
            <a class="btn btn-orange" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">Modifica</a>
            
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4 col-lg-4 text-left">
                <h3 class="font-weight-bold">La tua immagine:</h3>
                @if ($restaurant->img)
                    <img class="img-show img-thumbnail" src="{{ url( $restaurant->img) }}" alt="{{ $restaurant->name }}">
                    {{-- <img class="img-fluid" style="height:200px" src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}"> --}}
                @else 
                    <img class="img-fluid w-25 " src="{{ asset('images/restaurantplaceholder.png') }}" alt="{{ $restaurant->name }}">    
                @endif

            </div>
            <div class="col-xs-5 col-sm-8 col-md-8 col-lg-6 offset-md-1 text-left rest-info">
                <h3 class="font-weight-bold">Le tue informazioni:</h3>
                <h4>Numero di telefono:  {{ $restaurant->phone_number }}</h4>
                <h4>Posizione:  {{ $restaurant->location }}</h4>
                <h4>Orario di apertura:  {{ $restaurant->opening_time }}</h4>
                <h4>Orario di chiusura:  {{ $restaurant->closure_time }}</h4>
                <h4>Prezzo di consegna:  {{ $restaurant->price_shipping }}€</h4>
                <h4>Cucine: 
                    @foreach($restaurant->cuisines as $cuisine)
                    <span>{{ $cuisine-> name }} </span>
                    @endforeach
                </h4>
            </div>
        </div>
        <div class="mt-3 mb-4">
            <div class="actions d-flex">
                <div class="elenco-ristoranti col-md-5 ml-4">
                    <a href="{{ route('admin.restaurants.index' ) }}">I tuoi ristoranti</a>
                </div>
                <div class="elenco-piatti col-md-5 ml-5">
                    <a href="{{ route('admin.dishes.index', $restaurant -> id ) }}">I tuoi piatti</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
