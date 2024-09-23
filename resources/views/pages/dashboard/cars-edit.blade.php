@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Car Edit</h3>
            
            <form action="{{ route('car.update', $car->id ) }}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$car->id}}">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$car->name}}">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="brand" class="form-control" id="brand" name="brand" value="{{$car->brand}}">
                    <span class="text-danger">@error('brand'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="model" class="form-control" id="model" name="model" value="{{$car->model}}">
                    <span class="text-danger">@error('model'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="year" class="form-control" name="year" value="{{ $car->year }}">
                </div>
                <div class="form-group">
                    <label for="car_type">Car Type</label>
                    <input type="text" class="form-control" name="car_type" value="{{ $car->car_type }}">
                </div>
                <div class="form-group">
                    <label for="daily_rent_price">daily_rent_price</label>
                    <input type="text" class="form-control" name="daily_rent_price" value="{{ $car->daily_rent_price }}">
                </div>
                <div class="form-group">
                    <label for="availability">availability</label>
                    <input type="text" class="form-control" name="availability" value="{{ $car->availability }}">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    @if ($car->image)
                        <img src="{{ asset($car->image) }}" alt="Car Image" style="max-width: 100px;">
                    @endif
                    <input type="file" class="form-control" name="image">
                    
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