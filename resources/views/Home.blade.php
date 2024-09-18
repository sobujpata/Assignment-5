@extends("layout.app")
@section("content")
    <div class="container">
        <div class="header-content text-center mt-3 shadow-card">
            <h2>Car Rental Service</h2>
        </div>
        
        <form action="{{ route('cars.index') }}" method="get">
            <div class="row">
                <div class="form-group col-3">
                    {{-- <label for="car_type">Car Type</label>     --}}
                    <select name="car_type" id="car_type" class="form-control">
                        <option value="">Select Car Type</option>
                        @foreach ($car_types as $item)
                        <option value="{{$item->car_type}}" {{ request('car_type') == '$item->car_type' ? 'selected' : '' }}>{{$item->car_type}}</option>
                        @endforeach
                    </select>
                </div>    
                <div class="form-group col-3">
                    {{-- <label for="brand">Brand</label>     --}}
                    <select name="brand" id="brand" class="form-control">
                        <option value="" >Select Car Brand</option>
                        @foreach ($brands as $item)
                        <option value="{{$item->brand}}" {{ request('brand') == '$item->brand' ? 'selected' : '' }}>{{$item->brand}}</option>
                        @endforeach
                    </select>
                </div>    
                <div class="form-group col-3">
                    {{-- <label for="daily_rent_price">Max Daily Rent Price:</label> --}}
                    <input class="form-control" type="number" name="daily_rent_price" id="daily_rent_price" placeholder="Enter max price" value="{{ request('daily_rent_price') }}">                </div>
                <div class="form-group col-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="clear" class="btn btn-info"><a href="{{ url('/') }}">Reset Filter</a></button>
                </div>
            </div>   
        </form> 

        <div class="row mt-1">
            <h4 class="shadow"><a href="{{ url('/') }}">Cars</a></h4>
            @if($cars->isEmpty())
                <p>No cars found.</p>
            @else
            @foreach($cars as $car)
            <div class="col-md-4 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <img src="{{$car->image}}" alt="" class="" style="height: 190px">
                        <div class="content1 text-center">
                            <h3>{{ $car->name }} ({{ $car->brand }})</h3>
                            <p>Type: {{ $car->car_type }}</p>
                            <p>Daily Rent Price: ${{ $car->daily_rent_price }}</p>
                            <button class="btn btn-primary"><a href="{{ route('rentals.create', ['car_id' => $car->id]) }}">Book Now</a></button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="pagination">
                {{ $cars->links() }}
            </div>
        </div>

         {{-- Propuler brand --}}
        <div class="row mt-1">
            <h4 class="shadow rounded m-2 p-3">Popular Brands</h4>
            @foreach($popular_brands as $brand)
            <div class="col-md-3 mt-2 mb-2">
                <div class="card">
                    <div class="card-body">
                        <img src="{{$brand->image}}" alt="" class="" style="height: 130px">
                        <div class="content1 text-center">
                            <h3>{{ $brand->brand }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

    </div>
    
   
@endif
@endsection

