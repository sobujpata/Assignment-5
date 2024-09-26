<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use carbon\Carbon;

class AdminDashboardController extends Controller
{
    function AdminDashboard():View{
        $cars = Car::count();

        $currentDate = Carbon::today();
        // dd($currentDate);
        // Count current rentals where the start date is in the past or today and the end date is in the future or today
        $currentRentals = Rental::where('start_date', '<=', $currentDate)
                         ->where('end_date', '>=', $currentDate)
                         ->count();
        $available_cars = $cars - $currentRentals;

        $total_earn = Rental::sum('total_cost');

        // Get the start and end dates for the previous month
        $startOfLastMonth = Carbon::now()->startOfMonth()->subMonth();
        $endOfLastMonth = Carbon::now()->subMonth()->endOfMonth();

        // dd($endOfLastMonth);
        // Sum the total_cost for rentals from last month
        $total_last_month_earn = Rental::whereBetween('start_date', [$startOfLastMonth, $endOfLastMonth])
                               ->sum('total_cost');

        // Get the start and end dates for the current month
        $startOfCurrentMonth = Carbon::now()->startOfMonth();
        $endOfCurrentMonth = Carbon::now()->endOfMonth();

        // Sum the total_cost for rentals in the current month
        $total_current_month_earn = Rental::whereBetween('start_date', [$startOfCurrentMonth, $endOfCurrentMonth])
                                        ->sum('total_cost');

        // Get the start and end dates for the last week
        $startOfLastWeek = Carbon::now()->subWeek()->startOfWeek(Carbon::SUNDAY);  // Start of last week (Sunday)
        $endOfLastWeek = Carbon::now()->subWeek()->endOfWeek(Carbon::SATURDAY);    // End of last week (Saturday)

        // Sum the total_cost for rentals from last week
        $total_last_week_earn = Rental::whereBetween('start_date', [$startOfLastWeek, $endOfLastWeek])
                              ->sum('total_cost');


        // Get the start and end dates for the current week
        $startOfCurrentWeek = Carbon::now()->startOfWeek(Carbon::SUNDAY);  // Start of this week (Sunday)
        $endOfCurrentWeek = Carbon::now()->endOfWeek(Carbon::SATURDAY);    // End of this week (Saturday)

        // Sum the total_cost for rentals from the current week
        $total_current_week_earn = Rental::whereBetween('start_date', [$startOfCurrentWeek, $endOfCurrentWeek])
                                 ->sum('total_cost');

        
                                 // Get the start and end of the previous day
        $startOfPreviousDay = Carbon::yesterday()->startOfDay();  // Start of yesterday
        $endOfPreviousDay = Carbon::yesterday()->endOfDay();      // End of yesterday

        // Sum the total_cost for rentals from the previous day
        $total_previous_day_earn = Rental::whereBetween('start_date', [$startOfPreviousDay, $endOfPreviousDay])
                                 ->sum('total_cost');

        $customers = User::where('role', 'customer')->count();
        $admin = User::where('role', 'admin')->count();
        // dd($total_previous_day_earn);
        return view('pages.dashboard.dashboard-page', compact('cars', 'currentRentals', 'available_cars', 'total_earn', 'total_last_month_earn', 'total_current_month_earn', 'total_last_week_earn', 'total_current_week_earn', 'total_previous_day_earn', 'customers', 'admin'));
    }
}
