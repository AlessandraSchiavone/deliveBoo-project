@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
           <strong>{{ session('deleted')}}  eliminato correttamente!</strong> 
           
        </div>
         @endif
         <div class="d-flex align-items-center justify-content-between col-lg-11 pl-0 pr-5">
            <h1 class="my-4">Elenco Ristoranti</h1>
            <a href="{{ route('admin.restaurants.create') }}" class="btn btn-orange">Aggiungi un nuovo ristorante</a>
        </div>
        
        @if (count($restaurants) > 0)
        <div class="d-flex row">
            @foreach ($restaurants as $restaurant)
            <div class="restaurant-back col-lg-5 m-3 p-3">
                <div class="top d-flex justify-content-between mb-4">
                    <h2 class="col-md-8">{{$restaurant->name}}</h2>
                    <div class="buttons col-md-4 d-flex justify-content-end">
                        <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn ">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href=" {{ route('admin.restaurants.edit', $restaurant->id) }} " class="btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.restaurants.destroy', $restaurant -> id )}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo ristorante?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn" >
                            <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="bottom d-flex">
                    <div class="info col-md-7">
                        <small>{{$restaurant->slug}}</small>
                        <br>
                        @foreach($restaurant->cuisines as $cuisine)
                        <span class="badge badge-pill">
                            {{ $cuisine-> name }}
                        </span>
                        @endforeach
                    </div>
                    <div class="img col-md-5">
                        <img src="{{ url( $restaurant->img) }}" alt="{{$restaurant->name}}" class="img-thumbnail mr-3">
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="mt-3">
            <a  class="btn btn-secondary" href="{{ route('admin.orders.index', $restaurant -> id ) }}">Visualizza gli ordini</a>
        </div> --}}
        <div class="elenco-ordini col-md-5">
            <a href="{{ route('admin.orders.index') }}">Visualizza gli ordini</a>
        </div>
        @else
            <h3>Non hai nessun ristorante registrato</h3>
        @endif
    </div>  
@endsection