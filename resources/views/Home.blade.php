@extends("layout.app")
@section("content")
    <div class="container">
        <div class="header-content text-center mt-3 shadow-card">
            <h2>Cars List For Rental</h2>
        </div>
        <div class="row mt-1">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('cars/1.jpg')}}" alt="" class="" style="height: 190px">
                        <div class="content1 text-center">
                            <h3>Car Name</h3>
                            <p>Price</p>
                            <button class="btn btn-primary">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
