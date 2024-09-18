<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CarController extends Controller
{
    function index():View{
        return view('Home');
    }
    public function CarsList(){
        $cars = Car::orderBy("created_at","desc")->paginate(10);
        return response()->json($cars);
    }
}
