@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
           <strong>{{ session('deleted')}}  eliminato correttamente!</strong> 
           
        </div>
         @endif
        <h1 class="my-4">Elenco piatti del ristornante: <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="rest-link font-weight-bold">{{ $restaurant->name }}</a></h1>
        <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-orange mb-4">Aggiungi un nuovo piatto</a>


        @if (count($dishes) > 0)
        <div class="d-flex row">
            @foreach ($dishes as $dish)
            <div class="restaurant-back col-lg-5 m-3 p-3">
                <div class="top d-flex justify-content-between mb-2">
                    <h3 class="font-weight-bold col-md-8">{{$dish->name}}</h3>
                    <div class="buttons col-md-4 d-flex justify-content-end">
                        <a href=" {{ route('admin.dishes.edit',[$restaurant->id, $dish-> id]) }} " class="btn">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action=" {{ route('admin.dishes.destroy',[$restaurant->id, $dish-> id]) }} " method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn" >
                            <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="bottom d-flex">
                    <div class="info col-md-7 d-flex flex-column align-items-start">
                        <small class="mb-2">{{$dish->slug}}</small>
                        <span class="badge badge-pill mb-3">
                            {{ $dish->category->name }}
                        </span>
                        @if ($dish->description)
                        <p class="mb-3"><strong>Ingredienti</strong>: {{ $dish->description }}</p>
                        @endif
                        <h6 class="m-0">{{$dish->price}} &euro;</h6>
                    </div>
                    <div class="col-md-5 mt-3">
                        <div class="col-md-12 mb-2">
                            Disponibile: 
                            @if($dish->availability)
                            <span style="color:green">&check;</span>
                            @else
                            <span style="color:red">&cross;</span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-2">
                            Gluten Free: 
                            @if($dish->gluten_free)
                            <span style="color:green">&check;</span>
                            @else
                            <span style="color:red">&cross;</span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-2">
                            Vegetariano: 
                            @if($dish->vegetarian)
                            <span style="color:green">&check;</span>
                            @else
                            <span style="color:red">&cross;</span>
                            @endif
                        </div>
                        <div class="col-md-12 mb-2">
                            Vegano: 
                            @if($dish->vegan)
                            <span style="color:green">&check;</span>
                            @else
                            <span style="color:red">&cross;</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
            <h3>Non hai nessun piatto nel menù</h3>
        @endif



        {{-- <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Disponibilità</th>
                    <th>Slug</th>
                    <th colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dishes as $dish)
                    <tr>
                        <td>{{ $dish->id }}</td>
                        <td>{{ $dish->name }}</td>
                        <td>{{ $dish-> category->name }}</td>
                        <td>{{ $dish->availability ? 'Sì' : 'No'  }}</td>
                        <td>{{ $dish->slug }}</td>
                        <td>
                            <a href="{{ route('admin.dishes.show',[$restaurant->id, $dish-> id]) }}" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href=" {{ route('admin.dishes.edit',[$restaurant->id, $dish-> id]) }} " class="btn btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.dishes.destroy',[$restaurant->id, $dish->id] )}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo piatto?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" >
                                <i class="fas fa-times"></i>
                                </button>
                            </form>
                            
                        </td>     
                    </tr>
                @endforeach
            </tbody> 
        </table>    --}}
    </div>   
@endsection