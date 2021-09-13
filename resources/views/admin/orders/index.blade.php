@extends('layouts.app')
@section('content')
    <div class="container my-4">
        <h1 class="mt-4">Ciao, {{Auth::user()->name}}</h1>
        @if (count($orders)>0)
        <h3 class="mb-4">Gli ordini dei tuoi ristoranti</h3>
        @endif
        <a href="{{ route('admin.restaurants.index') }}" class="btn btn-orange mb-4">Torna ai tuoi ristoranti</a>
        @if (count($orders)>0)
        <div class="row">
            @foreach ($orders as $order)
            <div class="order-box mb-4 p-4 col-md-5 mr-4" style="background-color: rgba(255, 165, 31, 0.705);">
                <h4><span class="font-weight-bold">Ordine #{{$order->id}}</span></h4>
                <h4><span class="font-weight-bold">{{$order->dishes[0]->restaurant->name}}</span></h4>
                <ul class="list-unstyled">
                    <li><i class="fas fa-calendar-day"></i> <strong>Effettuato il</strong>: {{$order->order_date}}</li>
                    <li><i class="fas fa-user"></i> <strong>Utente</strong>: {{$order->payer_name}} {{$order->payer_surname}}, {{$order->payer_email}}</li>
                    <li><i class="fas fa-calendar-day"></i> <strong>Indirizzo</strong>: {{$order->payer_address}}</li>
                </ul>
                <div class="order-details my-2 p-4 col-md-10" style="background-color: white;">
                    <h5 class="font-weight-bold">Dettagli:</h5>
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
        </div>
        @else
            <h3>Nessun ordine effettuato</h3>
        @endif
    </div>
@endsection