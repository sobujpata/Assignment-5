<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        $cars = Car::paginate(10);
        return view('pages.dashboard.cars-list', compact('cars'));
    }

    public function edit($id){
        $car = Car::findOrFail($id);
        return view('pages.dashboard.cars-edit', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Retrieve the car
        $car = Car::findOrFail($id);
        
        // Debugging: Check if car is retrieved correctly
        // dd($car);

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();

            // Move image to 'cars' directory inside public folder
            $image->move(public_path('cars'), $imageName);

            // Save image name to the car object
            $car->image = "cars/".$imageName;
        }

        // Save the updated car information
        $car->save();

        return redirect()->route('car.index')->with('success', 'Car updated successfully');
    }

    public function create(){
        return view('pages.dashboard.cars-create');
    }
        public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'car_type' => 'required|string|max:255',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('cars'), $imageName);
        }

        // Create a new car record using mass assignment
        Car::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'model' => $request->model,
            'year' => $request->year,
            'car_type' => $request->car_type,
            'daily_rent_price' => $request->daily_rent_price,
            'availability' => $request->availability,
            'image' => $imageName ? "cars/".$imageName : null,  // Save the image path if image is uploaded
        ]);

        return redirect()->route('car.index')->with('success', 'Car created successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return redirect()->route('car.index')->with('success', 'car delete successfully.');
    }


}
