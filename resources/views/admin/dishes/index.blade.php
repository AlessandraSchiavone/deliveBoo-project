@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
           <strong>{{ session('deleted')}}  eliminato correttamente!</strong> 
           
        </div>
         @endif
        <h1 class="my-4">Elenco Piatti</h1>
        <a href="{{ route('admin.dishes.create', $restaurant->id) }}" class="btn btn-primary mb-4">Aggiungi un nuovo piatto</a>          
        <table class="table table-striped">
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
                            <a href=" {{ route('admin.dishes.edit',[$restaurant->id, $dish-> id]) }} " class="btn btn-primary">
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
        </table>   
    </div>   
@endsection