@extends('layouts.app')

@section('scripts')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$restaurant->name}}</div>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                   
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   


    var months = <?php echo $months; ?>;
    var numberOrders = <?php echo $numberOrders; ?>;
    // var nameRestaurant = <?php echo $numberOrders; ?>;
    // console.log(numberOrders);
    // console.log(months);
    // console.log(nameRestaurant);


    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Ordini - 2021'  ,
                data: [5,33,25,11,0,0,0,0,numberOrders],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        // options: {
        //     scales: {
        //         y: {
        //             beginAtZero: true
        //         }
        //     }
        // }
    });
</script>
@endsection