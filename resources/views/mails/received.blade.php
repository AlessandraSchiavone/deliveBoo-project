<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Now - Ordine Ricevuto</title>
</head>
<body>
    <h1>Nuovo ordine ricevuto</h1>
    <strong>Da</strong>: {{$order->payer_surname}} {{$order->payer_name}}<br>
    <strong>Indirizzo</strong>: {{$order->payer_address}}<br>
    <strong>Importo totale</strong>: {{$order->total}}&euro;<br>
    <strong>Data</strong>: {{$order->order_date}}<br>
    <strong>Piatti</strong>:
    <ul style="list-style: none">
        @foreach ($order->dishes as $dish)
            <li>{{$dish->name}} <strong>x{{$dish->pivot->quantity}}</strong></li>
        @endforeach
    </ul>

</body>
</html>