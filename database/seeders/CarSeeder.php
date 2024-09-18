<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Car::insert([
            [
                'name' => 'Toyota Camry',
                'brand' => 'Toyota',
                'model' => 'Camry',
                'year' => 2020,
                'car_type' => 'Sedan',
                'daily_rent_price' => 50.00,
                'availability' => true,
                'image' => 'cars/toyota_camry.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Honda CR-V',
                'brand' => 'Honda',
                'model' => 'CR-V',
                'year' => 2021,
                'car_type' => 'SUV',
                'daily_rent_price' => 70.00,
                'availability' => true,
                'image' => 'cars/honda_crv.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ford Mustang',
                'brand' => 'Ford',
                'model' => 'Mustang',
                'year' => 2019,
                'car_type' => 'Coupe',
                'daily_rent_price' => 100.00,
                'availability' => true,
                'image' => 'cars/ford_mustang.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tesla Model S',
                'brand' => 'Tesla',
                'model' => 'Model S',
                'year' => 2022,
                'car_type' => 'Electric',
                'daily_rent_price' => 120.00,
                'availability' => true,
                'image' => 'cars/tesla_model_s.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BMW X5',
                'brand' => 'BMW',
                'model' => 'X5',
                'year' => 2021,
                'car_type' => 'SUV',
                'daily_rent_price' => 90.00,
                'availability' => true,
                'image' => 'cars/bmw_x5.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
