@extends('layouts.app')

@section('content')

    <div class="container">
      <h1 class="my-4">Inserisci un nuovo piatto</h1>
      <form action="{{ route('admin.dishes.store', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
            <!-- Nome -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Inserisci il nome del piatto" name="name" value="{{ old('name') }}">
                @error('name')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Descrizione -->
            <div class="form-group">
                <label for="description">Ingredienti </label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci gli ingredienti" rows="6">{{ old('description') }} </textarea>
                @error('description')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Immagini -->
            <div class="form-group">
                <label for="img">Immagine </label>
                <input type="file" name="img" class="form-control-file @error('img') is-invalid @enderror" id="img">
                @error('img')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
           <!-- Prezzo -->
            <div class="content_row">
                <label for="price" class="col-sm-1-12 col-form-label ">Prezzo </label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price') }}" min="0" max="999.99" step="0.01">
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
                        <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Switch Gluten -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="gluten_free" type="checkbox" id="gluten_free">
                    <label class="form-check-label" for="gluten_free">Gluten Free</label>
                </div>
            </div>
            <!-- Switch Vegetarian -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="vegetarian" type="checkbox" id="vegetarian">
                    <label class="form-check-label" for="vegetarian">Vegetariano</label>
                </div>
            </div>
            <!-- Switch Vegan -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="vegan" type="checkbox" id="vegan">
                    <label class="form-check-label" for="vegan">Vegano</label>
                </div>
            </div>
            <!-- Switch Disponibilità -->
            <div class="form-group">
                <div class="form-check form-switch">
                    <input class="form-check-input " name="availability" type="checkbox" id="availability" >
                    <label class="form-check-label" for="availability">Disponibile</label>
                </div>
            </div>
            

           
            <button type="submit" class="btn btn-primary">Crea</button>
           
        </form>  
    </div>
    
@endsection
