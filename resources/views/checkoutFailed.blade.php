<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="icon" href="{{ asset("images/favicon.png") }}">

        <title>Food Now</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>      
        <div class="error404">
            <div class="pattern">
            </div>
            <div class="content">
                <img src="{{ asset('images/burgerNotFound.png') }}" alt="">
                <h1>Qualcosa è andato storto</h1>
                <div>Siamo spiacenti, Il pagamento non è andato a buon fine. <br>
                    Riprova con un altro metodo di pagamento
                </div>
                <a href="/"><button class="btn ">Vai alla home</button></a>
            </div>       
        </div> 
    </body>
</html>