<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\RentalConfirmationToCustomer;
use App\Mail\RentalNotificationToAdmin;
use Illuminate\Support\Facades\Mail;

class RentalController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->header('id');
        $rentals = Rental::where('user_id', $user_id)->with('car')->get();
        return view('rentals.index', compact('rentals'));
    }

    public function destroy(Rental $rental)
    {
        // Only allow cancellation if the rental hasn't started
        if ($rental->start_date > now()) {
            $rental->delete();
            return back()->with('success', 'Booking canceled successfully.');
        }

        return back()->withErrors('You cannot cancel a booking that has already started.');
    }
    public function create(Request $request)
    {
        $car = Car::findOrFail($request->car_id);
        // dd($car);
        return view('rentals.create', compact('car', ));
    }

    public function store(Request $request)
    {
        $user_id = $request->header('id');
        $car = Car::findOrFail($request->car_id);

        // Check availability for the chosen period
        $existingRentals = Rental::where('car_id', $car->id)
                        ->where(function ($query) use ($request) 
                        {$query->whereBetween('start_date', [$request->start_date, $request->end_date])
                        ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
                        })
                        ->exists();

        if ($existingRentals) {
            return back()->withErrors('This car is not available for the selected period.');
        }

        // Calculate total cost
        $days = \Carbon\Carbon::parse($request->start_date)->diffInDays(\Carbon\Carbon::parse($request->end_date));
        $total_cost = $days * $car->daily_rent_price;

        // Create the rental record
        $rental = Rental::create([
            'user_id' => $user_id,
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total_cost,
        ]);
        $user = User::find($user_id);
        // Send email to the customer
        Mail::to($user->email)->send(new RentalConfirmationToCustomer($rental));

        // Send email to the admin (You can define a static admin email or fetch from the database)
        Mail::to('bafsalim@gmail.com')->send(new RentalNotificationToAdmin($rental, $user));

        return redirect()->route('rentals.index')->with('success', 'Booking successful!');
    }
}
