@extends('layout.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>My Bookings</h1></div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                        </div>
                        @endif
                        @foreach($rentals as $rental)
                        <div class="rental">
                            <h3>{{ $rental->car->name }} ({{ $rental->car->brand }})</h3>
                            <p>Start Date: {{ $rental->start_date }}</p>
                            <p>End Date: {{ $rental->end_date }}</p>
                            <p>Total Cost: ${{ $rental->total_cost }}</p>
                            <p>Status: {{ $rental->status }}</p>

                            @if($rental->start_date > now())
                                <form action="{{ route('rentals.destroy', $rental->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel Booking</button>
                                </form>
                            @endif
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
