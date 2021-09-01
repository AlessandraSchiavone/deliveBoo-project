@extends('layouts.app')

@section('content')

    <div class="container">
    <h1 class="my-4">Modifica il piatto: <span class="text-info">{{ $dish -> name}}</span></h1>
      <form action="{{ route('admin.dishes.update', [$restaurant->id, $dish->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <!-- Nome -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome del piatto" name="name" value="{{ old('name', $dish->name) }}">
                @error('name')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Descrizione -->
            <div class="form-group">
                <label for="description">Ingredienti </label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci gli ingredienti" rows="6">{{ old('description', $dish->description) }} </textarea>
                @error('description')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Immagini -->
            <div class="form-group">
                <label for="img">Immagine </label>
                @if ($dish->img)
                    <div class="mb-3">
                        <img style="width: 200px" src="{{ asset('storage/' . $dish->img) }}" alt="{{ $dish->name }}"> 
                    </div>
                @endif
                <input type="file" name="img" class="form-control-file @error('img') is-invalid @enderror" id="img">
                @error('img')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
           <!-- Prezzo -->
            <div class="content_row">
                <label for="price" class="col-sm-1-12 col-form-label ">Prezzo </label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price',$dish->price) }}" min="0" max="999.99" step="0.01">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Categorie checkbox -->
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">-- Seleziona una categoria --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id', $dish->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Switch Gluten -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="gluten_free" type="checkbox" id="gluten_free"
                    {{ $dish->gluten_free ? 'checked' : '' }}>
                    <label class="form-check-label" for="gluten_free">Gluten Free</label>   
                </div>
            </div>
            <!-- Switch Vegetarian -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="vegetarian" type="checkbox" id="vegetarian"
                    {{ $dish->vegetarian ? 'checked' : '' }}>
                    <label class="form-check-label" for="vegetarian">Vegetariano</label>
                </div>
            </div>
            <!-- Switch Vegan -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="vegan" type="checkbox" id="vegan"
                    {{ $dish->vegan ? 'checked' : '' }}>

                    <label class="form-check-label" for="vegan">Vegano</label>
                </div>
            </div>
            <!-- Switch Disponibilità -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="availability" type="checkbox" id="availability" 
                    {{ $dish->availability ? 'checked' : '' }}>
                    <label class="form-check-label" for="availability">Disponibile</label>
                </div>
            </div>
            

           
            <button type="submit" class="btn btn-primary">Salva</button>
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.dishes.index', $restaurant->id ) }}">Elenco piatti</a>
        </form>  
    </div>
    
@endsection
