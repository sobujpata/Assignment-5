@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Rental Status Edit</h3>
            
            <form action="{{ route('rental.update', $rental->id ) }}" method="post">
                @csrf
                @method('PUT') <!-- Specify that this is a PUT request -->
                <input type="hidden" name="id" value="{{ $rental->id }}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="car_name">Car name</label>
                    <input type="text" class="form-control" id="car_name" name="car_name" value="{{$car->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="text" class="form-control" id="brand" name="brand" value="{{$car->brand}}" readonly>
                </div>
                <div class="form-group">
                    <label for="start_date">start_date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{$rental->start_date}}">
                    <span class="text-danger">@error('start_date'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{$rental->end_date}}">
                    <span class="text-danger">@error('end_date'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="total_cost">Total Cost</label>
                    <input type="number" class="form-control" id="total_cost" name="total_cost" value="{{$rental->total_cost}}">
                    <span class="text-danger">@error('total_cost'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="status">Rental status</label>
                        <select class="form-control" id="status" name="status">
                        <option value="" disabled {{ $rental->status == '' ? 'selected' : '' }}>Select One</option>
                        <option value="Ongoing" {{ $rental->status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                        <option value="Completed" {{ $rental->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                        <option value="Canceled" {{ $rental->status == 'Canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    <span class="text-danger">@error('status'){{$message}}@enderror</span>
                </div>
                <div class="form-group mt-2">
                    <button type="reset" class="btn btn-danger">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
        </div>    
    </div>

@endsection