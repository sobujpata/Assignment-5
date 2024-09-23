@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 align="center">Cars List</h3>
                <a href="{{ route('car.create') }}" class="btn btn-primary">Add Car</a>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Ser No</th>
                        <th>Cuatomer Name</th>
                        <th>Car Name</th>
                        <th>Car Brand</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Total Cost</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($rentals->perPage() * ($rentals->currentPage() - 1)) + 1;
                    @endphp
                    @foreach ($rentals as $rental)
                    <tr>
                        <td align="center">{{ $i++ }}</td>
                        <td>{{ $rental->user->name }}</td>
                        <td>{{ $rental->car->name }}</td>
                        <td>{{ $rental->car->brand }}</td>
                        <td>{{ $rental->start_date }}</td>
                        <td>{{ $rental->end_date }}</td>
                        <td>$ {{ $rental->total_cost }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>
                            <a href="/rental-edit/{{ $rental->id }}" class="btn btn-primary my-0"><i class="fa fa-pen"></i></a>
                            <a href="/rental-delete/{{ $rental->id }}" class="btn btn-danger my-0"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $rentals->links() }}
        </div>    
    </div>

@endsection