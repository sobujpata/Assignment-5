<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\CarController;
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

Route::get('/', [CarController::class, 'index']);
//Car Route
Route::get('/cars', [CarController::class, 'CarsList']);
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
    // Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->name('user.dashboard')->middleware([TokenVerificationMiddleware::class]);
    Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
});

//admin dashboard
Route::middleware(['admin'])->group(function () {
    Route::get('/admin-dashboard',[AdminDashboardController::class,'AdminDashboard'])->name('admin.dashboard')->middleware([TokenVerificationMiddleware::class]);
});
