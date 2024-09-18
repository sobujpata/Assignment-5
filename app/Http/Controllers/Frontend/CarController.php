<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    public function index(Request $request)
    {
        // Start with an available cars query
        $query = Car::where('availability', true);

        // Apply filter by car type if selected
        if ($request->has('car_type') && $request->car_type != '') {
            $query->where('car_type', $request->car_type);
        }

        // Apply filter by brand if selected
        if ($request->has('brand') && $request->brand != '') {
            $query->where('brand', $request->brand);
        }

        // Apply filter by daily rent price if selected
        if ($request->has('daily_rent_price') && $request->daily_rent_price != '') {
            $query->where('daily_rent_price', '<=', $request->daily_rent_price);
        }

        // Get the filtered list of cars
        $cars = $query->paginate(9);

        $car_types = Car::select('car_type')->distinct()->get();
        $brands = Car::select(columns: 'brand')->distinct()->get();
        $popular_brands = Car::select('brand', DB::raw('MIN(image) as image'))
                    ->groupBy('brand')
                    ->get();
        // dd($brands);

        // Pass the cars and filter parameters to the view
        return view('Home', compact('cars','car_types','brands','popular_brands', 'request'));
    }
}
