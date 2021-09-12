@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <h1 class="mt-4">Ciao, {{Auth::user()->name}}</h1>
        <h3 class="mb-4">Gli ordini ai tuoi ristoranti</h3>
        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-primary mb-4">Torna ai tuoi ristoranti</a>
        @if ($orders)
            @foreach ($orders as $order)
            <div class="order-box my-4 p-4" style="background-color: lightgray;">
                <h4><span class="font-weight-bold">Ordine #{{$order->id}}</span></h4>
                <ul class="list-unstyled">
                    <li><i class="fas fa-calendar-day"></i> Effettuato il: {{$order->order_date}}</li>
                    <li><i class="fas fa-user"></i> Utente: {{$order->payer_name}}, {{$order->payer_surname}}, {{$order->payer_email}}</li>
                    <li><i class="fas fa-calendar-day"></i> Indirizzo: {{$order->payer_address}}</li>
                </ul>
                <div class="order-details my-2 p-4" style="background-color: white;">
                    <h5>Dettagli:</h5>
                    <ul>
                        @foreach ($order->dishes as $dish)
                            <li><span class="font-weight-bold">{{$dish->pivot->quantity}}x</span> {{$dish->name}}</li>
                        @endforeach
                    </ul>
                </div>
                <h6><span class="font-weight-bold">Totale:</span> {{$order->total}} €</h6>
                <h6><span class="font-weight-bold mr-2">Status pagamento: </span> 
                    @if ($order->status == 1)
                    Avvenuto con successo                      
                    @else
                    Pagamento fallito
                @endif</h6>
            </div>
            @endforeach
        @else
            <h3>Nessun ordine effettuato</h3>
        @endif
    </div>
@endsection