<h1>Thank you for renting a car from us!</h1>

<p>Dear {{ $rental->customer_name }},</p>

<p>Here are your rental details:</p>
<ul>
    <li>Car: {{ $rental->car->model }}</li>
    <li>Pickup Date: {{ $rental->start_date }}</li>
    <li>Return Date: {{ $rental->end_date }}</li>
    <li>Total Cost: ${{ $rental->total_cost }}</li>
</ul>

<p>We hope you have a great trip!</p>
