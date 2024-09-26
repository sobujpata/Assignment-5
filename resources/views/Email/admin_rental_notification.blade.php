<h1>A car has been rented</h1>

<p>A car has been rented by {{ $user->name }} (Email: {{ $user->email }}).</p>

<p>Rental Details:</p>
<ul>
    <li>Car: {{ $rental->car->model }}</li>
    <li>Pickup Date: {{ $rental->start_date }}</li>
    <li>Return Date: {{ $rental->end_date }}</li>
    <li>Total Cost: ${{ $rental->total_cost }}</li>
</ul>