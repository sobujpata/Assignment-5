<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RentalController extends Controller
{
    public function index(){
        $rentals = Rental::with('user', 'car')->paginate(10);
        return view('pages.dashboard.rentals-list', compact('rentals'));
    }

    public function edit($id)
    {
        
        $rental = Rental::findOrFail($id);

        $customer = User::select('name')->where('id', $rental->user_id)->first();
        // dd($customer->name);
        $car = Car::select('name', 'brand')->where('id', $rental->car_id)->first();

        Return view('pages.dashboard.rentals-edit', compact('rental', 'customer', 'car'));
    }


    public function update(Request $request, $id)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $total_cost = $request->input('total_cost');
        $status = $request->input('status');

        Rental::where('id', $id)->update([
            'start_date' => $start_date,
            'end_date'=>$end_date,
            'total_cost'=>$total_cost,
            'status'=>$status

        ]);

        // Redirect back with success message
        return redirect()->route('car.rental')->with('success', 'Rental updated successfully.');
    }
    public function destroy(Request $request, $id)
    {
        $rental = Rental::findOrFail($id);
        $rental->delete();

        return redirect()->route('car.rental')->with('success', 'Rental delete successfully.');
    }


}
