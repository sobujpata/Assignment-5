@extends('layout.sidenav-layout')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>New Car Add</h3>
            
            <form action="{{ route('car.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="brand">Brand</label>
                    <input type="brand" class="form-control" id="brand" name="brand" value="">
                    <span class="text-danger">@error('brand'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="model">Model</label>
                    <input type="model" class="form-control" id="model" name="model" value="">
                    <span class="text-danger">@error('model'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="year" class="form-control" name="year" value="">
                    <span class="text-danger">@error('year'){{$message}}@enderror</span>
                </div>
                <div class="form-group">
                    <label for="car_type">Car Type</label>
                    <input type="text" class="form-control" name="car_type" value="">
                    <span class="text-danger">@error('car_type'){{$message}}@enderror</span>

                </div>
                <div class="form-group">
                    <label for="daily_rent_price">daily_rent_price</label>
                    <input type="text" class="form-control" name="daily_rent_price" value="">
                    <span class="text-danger">@error('daily_rent_price'){{$message}}@enderror</span>

                </div>
                <div class="form-group">
                    <label for="availability">availability</label>
                    <input type="text" class="form-control" name="availability" value="">
                    <span class="text-danger">@error('availability'){{$message}}@enderror</span>

                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image">
                    <span class="text-danger">@error('image'){{$message}}@enderror</span>

                    
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