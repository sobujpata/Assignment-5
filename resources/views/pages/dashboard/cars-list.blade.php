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
                        <th>Name</th>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Car type</th>
                        <th>Car rent price</th>
                        <th>Availability</th>
                        <th>image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = ($cars->perPage() * ($cars->currentPage() - 1)) + 1;
                    @endphp
                    @foreach ($cars as $car)
                    <tr>
                        <td align="center">{{ $i++ }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{ $car->model }}</td>
                        <td>{{ $car->year }}</td>
                        <td>{{ $car->car_type }}</td>
                        <td>{{ $car->daily_rent_price }}</td>
                        <td>{{ $car->availability }}</td>
                        <td>{{ $car->image }}</td>
                        <td>
                            <a href="/car-edit/{{ $car->id }}" class="btn btn-primary my-0"><i class="fa fa-pen"></i></a>
                            <a href="/car-delete/{{ $car->id }}" class="btn btn-danger my-0"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $cars->links() }}
        </div>    
    </div>

@endsection