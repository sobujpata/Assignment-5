<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\CarController;
use App\Http\Controllers\Frontend\RentalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CarController::class, 'index'])->name('cars.index');

//Car Route
// Route::get('/cars', [CarController::class, 'CarsList']);
// Route::get('/cars-list', [CarController::class, 'CarsList']);

//Login API

Route::post('/user-login', [UserController::class, 'userLogin'])->name('login');
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::post('/send-otp', [UserController::class, 'SendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'VerifyOTP']);
Route::post('/reset-password', [UserController::class, 'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);

//profile edit api
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);

//logout route
Route::get('/logout', [UserController::class, 'UserLogout']);

//Customer login Route
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);


//Customer dashboard route
Route::middleware(['user'])->group(function (){
    Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index')->middleware([TokenVerificationMiddleware::class]);
    Route::delete('/rentals/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/rentals/create', [RentalController::class, 'create'])->name('rentals.create')->middleware([TokenVerificationMiddleware::class]);
    Route::post('/rentals', [RentalController::class, 'store'])->name('rentals.store')->middleware([TokenVerificationMiddleware::class]);

    // Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->name('user.dashboard')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
});

//admin dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard',[AdminDashboardController::class,'AdminDashboard'])->name('admin.dashboard')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/users',[CustomerController::class,'index'])->name('user.index')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/user-create',[CustomerController::class,'create'])->name('user.create')->middleware([TokenVerificationMiddleware::class]);
    Route::post('/user-store',[CustomerController::class,'store'])->name('user.store')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/users-edit/{id}',[CustomerController::class,'edit'])->name('user.edit')->middleware([TokenVerificationMiddleware::class]);
    Route::post('/user-update/{id}',[CustomerController::class,'update'])->name('user.update')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/user-delete/{id}',[CustomerController::class,'destroy'])->name('user.destroy')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/cars-list',action: [AdminCarController::class,'index'])->name('car.index')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/car-create',action: [AdminCarController::class,'create'])->name('car.create')->middleware([TokenVerificationMiddleware::class]);
    Route::post('/car-store',action: [AdminCarController::class,'store'])->name('car.store')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/car-edit/{id}',action: [AdminCarController::class,'edit'])->name('car.edit')->middleware([TokenVerificationMiddleware::class]);
    Route::put('/car-update/{id}',action: [AdminCarController::class,'update'])->name('car.update')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/car-delete/{id}',action: [AdminCarController::class,'destroy'])->name('car.destroy')->middleware([TokenVerificationMiddleware::class]);

    Route::get('/car-rental-list',action: [AdminRentalController::class,'index'])->name('car.rental')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/rental-edit/{id}',action: [AdminRentalController::class,'edit'])->name('rental.edit')->middleware([TokenVerificationMiddleware::class]);
    Route::put('/rental-update/{id}',action: [AdminRentalController::class,'update'])->name('rental.update')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/rental-delete/{id}',action: [AdminRentalController::class,'destroy'])->name('rental.destroy')->middleware([TokenVerificationMiddleware::class]);
});
