@extends('layouts.app')

@section('content')

    <div class="container">
      <h1 class="my-4">Modifica il ristorante: <span class="text-info">{{ $restaurant -> name}}</span></h1>
      <form action="{{ route('admin.restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <!-- Nome -->
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $restaurant->name) }}" disabled="disabled" >
            </div>  
            <!-- Descrizione -->
            <div class="form-group">
                <label for="description">Descrizione </label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci la descrizione del ristorante" rows="6">{{ old('description', $restaurant->description) }} </textarea>
                @error('description')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Immagini -->
            <div class="form-group">
                <label for="img">Immagine </label>
                @if ($restaurant->img)
                    <div class="mb-3">
                        <img style="width: 200px" src="{{ asset('storage/' . $restaurant->img) }}" alt="{{ $restaurant->name }}"> 
                    </div>
                @endif
                <input type="file" name="img" class="form-control-file @error('img') is-invalid @enderror" id="img">
                @error('img')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <!-- Numero di telefono -->
            <div class="form-group">
                <label for="phone_number">Numero di telefono</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $restaurant->phone_number) }}" disabled="disabled">
            </div>
            <!-- Indirizzo -->
            <div class="form-group">
                <label for="location">Indirizzo</label>
                <input type="text" class="form-control @error('location') is-invalid @enderror" id="location" placeholder="Inserisci l'indirizzo " name="location" value="{{ old('location', $restaurant->location) }}">
                @error('location')
                    <small class="text-danger" >{{ $message }}</small>
                @enderror
            </div>
            <!-- Orario apertura -->
            <div class="content_row">
                <label for="opening_time" class="col-sm-1-12 col-form-label ">Orario di apertura</label>
                <input type="time" class="form-control @error('opening_time') is-invalid @enderror" id="opening_time" name="opening_time" value="{{ old('opening_time', $restaurant->opening_time) }}" maxlength="20">
                @error('opening_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Orario chiusura -->
            <div class="content_row">
                <label for="closure_time" class="col-sm-1-12 col-form-label ">Orario di chiusura</label>
                <input type="time" class="form-control @error('closure_time') is-invalid @enderror" id="closure_time" name="closure_time" value="{{ old('closure_time', $restaurant->closure_time) }}" maxlength="20">
                @error('closure_time')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
           <!-- Prezzo di consegna -->
            <div class="content_row">
                <label for="price_shipping" class="col-sm-1-12 col-form-label ">Prezzo di consegna</label>
                <input type="number" class="form-control @error('price_shipping') is-invalid @enderror" id="price_shipping" name="price_shipping" value="{{old('price_shipping', $restaurant->price_shipping) }}" min="0" max="9.99" step="0.01">
                @error('price_shipping')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Fascia prezzo -->
            <div class="form-group">
                <label for="price_rating">Fascia prezzo</label>
                <select class="form-control @error('price_rating') is-invalid @enderror" name="price_rating" id="price_rating">
                    <option value="{{ $restaurant->price_rating }}" selected disabled="disabled">
                        @if($restaurant->price_rating == 1 )
                        Basso
                        @elseif($restaurant->price_rating == 2 )
                        Medio
                        @elseif($restaurant->price_rating == 3 )
                        Alto
                        @endif
                    </option>
                </select>
            </div> 

            <!-- Cucine checkbox -->
            <div class="form-group">
                <h5>Cucine</h5>
                @foreach($cuisines as $cuisine)
                <div class="form-check form-check-inline">
                    @if($errors->any())
                        <input class="form-check-input" name="cuisines[]" type="checkbox" id="cuisine-{{ $cuisine->id }}" value="{{ $cuisine-> id }}" disabled="disabled"
                        {{ in_array( $cuisine->id , old('cuisines', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="cuisine-{{ $cuisine->id }}">{{ $cuisine-> name}}</label>
                    @else
                        <input class="form-check-input" name="cuisines[]" type="checkbox" id="cuisine-{{ $cuisine->id }}" value="{{ $cuisine-> id }}" disabled="disabled"
                        {{ $restaurant->cuisines->contains($cuisine->id)? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="cuisine-{{ $cuisine->id }}">{{ $cuisine-> name}}</label>
                    @endif
                </div>
                @endforeach 
                @error('cuisines')
                    <div>
                        <small class="text-danger">{{ $message }}</small>
                    </div>
                @enderror 
            </div>  
           
            <button type="submit" class="btn btn-primary">Salva</button>
            <a  class="btn btn-secondary ml-2" href="{{ route('admin.restaurants.index' ) }}">Elenco ristoranti</a>
           
        </form>  
    </div>
    
@endsection
