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
        <div class="payment-success">
            <div class="content">
            <img src="{{ asset('images/Logo_chef.png') }}" alt="">
                <h1>Il pagamento è andato a buon fine.</h1>
                <div>Riceverai presto una mail con i dati del tuo ordine.<br>
                Grazie per aver scelto Food Now <span class="heart">&#10084;</span>
                </div>
                <a href="/" ><button class="btn">Vai alla home</button></a>
            </div>
            <div class="color"><img class="delivery" src="/images/delivery.png" alt="delivery"></div>
        </div>  
    </body>



    <script type="text/javascript">
        localStorage.clear();
    </script>   
        
    
</html>