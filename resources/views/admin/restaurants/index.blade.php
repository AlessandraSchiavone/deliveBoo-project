@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
           <strong>{{ session('deleted')}}  eliminato correttamente!</strong> 
           
        </div>
         @endif
        <h1 class="my-4">Elenco Ristoranti</h1>
        <a href="{{ route('admin.restaurants.create') }}" class="btn btn-primary mb-4">Aggiungi un nuovo ristorante</a>
        @if (count($restaurants) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Cucine</th>
                        <th>Slug</th>
                        <th colspan="3">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->id }}</td>
                            <td>{{ $restaurant->name }}</td>
                            <td>
                                @foreach($restaurant->cuisines as $cuisine)
                                    <span class="badge badge-dark">
                                        {{ $cuisine-> name }}
                                    </span>
                                @endforeach
                            </td>
                            <td>{{ $restaurant->slug }}</td>
                            <td>
                                <a href="{{ route('admin.restaurants.show', $restaurant->id) }}" class="btn btn-success">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a href=" {{ route('admin.restaurants.edit', $restaurant->id) }} " class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.restaurants.destroy', $restaurant -> id )}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo ristorante?')">
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
            </table>  
        @else
            <h3>Non hai nessun ristorante registrato</h3>
        @endif
        <div class="mt-3">
            <a  class="btn btn-secondary" href="{{ route('admin.orders.index', $restaurant -> id ) }}">Visualizza gli ordini</a>
        </div>
    </div>  
@endsection