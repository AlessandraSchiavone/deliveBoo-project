@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <h1>{{ $restaurant-> name }}</h1>
        <small> {{ $restaurant-> slug }} </small>
        <div class="mt-3 h4">
            @foreach($restaurant->cuisines as $cuisine)
            <span class="badge badge-dark">{{ $cuisine-> name }}</span>
            @endforeach
        </div>
         
        <div class="mt-3">
            <a class="btn btn-warning" href="{{ route('admin.restaurants.edit', $restaurant->id) }}"> Modifica</a>
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.restaurants.index' ) }}">Elenco ristoranti</a>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                @if ($restaurant->img)
                    <img class="img-fluid" src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}">
                @else 
                    <img class="img-fluid" src="{{ asset('images/placeholder.png') }}" alt="{{ $restaurant->name }}">    
                @endif

            </div>
            <div class="col-md-12 mt-4">
                {{ $restaurant-> description }}
            </div>
        </div>
        <div class="mt-3">
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.dishes.index', $restaurant -> id ) }}">Elenco piatti</a>
        </div>
    </div>
@endsection
