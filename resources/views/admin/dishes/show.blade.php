@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <h1>{{ $dish-> name }}</h1>
        <small> {{ $dish-> slug }} </small>
        <div class="mt-3 h4">
            <span class="badge badge-dark">{{ $dish->category-> name }}</span>
        </div>
         
        <div class="mt-3">
            <a class="btn btn-warning" href="{{ route('admin.dishes.edit',[$restaurant->id, $dish-> id]) }}"> Modifica</a>
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.dishes.index', $restaurant->id ) }}">Elenco piatti</a>
        </div>
        <div class="row mt-4">
            <div class="col-md-8">
                @if ($restaurant->img)
                    <img class="img-fluid" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}">
                @else 
                    <img class="img-fluid" src="{{ asset('images/placeholder.png') }}" alt="{{ $dish->name }}">    
                @endif

            </div>
            <div class="col-md-12 mt-4">
                {{ $dish-> description }}
            </div>
            <div class="col-md-12 mt-4">
                {{ $dish-> price }}&euro;
            </div>
            <div class="col-md-12 mt-4">
                Gluten Free: 
                @if($dish->gluten_free)
                <span style="color:green">&check;</span>
                @else
                <span style="color:red">&cross;</span>
                @endif
            </div>
            <div class="col-md-12 mt-2">
                Vegetariano: 
                @if($dish->vegetarian)
                <span style="color:green">&check;</span>
                @else
                <span style="color:red">&cross;</span>
                @endif
            </div>
            <div class="col-md-12 mt-2">
                Vegano: 
                @if($dish->vegan)
                <span style="color:green">&check;</span>
                @else
                <span style="color:red">&cross;</span>
                @endif
            </div>
            
        </div>
    </div>
@endsection
