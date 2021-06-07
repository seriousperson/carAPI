<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();
        $dummyData = \Faker\Factory::create();

        $colours = ["black", "silver", "blue", "Grey", "white", "red", "green", "orange"  ];
        $transmissions = [ 'manual', 'automatic'];
        $fuel = ["Petrol", "Diesel"];

        for($i = 0; $i < 5000; $i++){
          Car::create([
            'colour' => $colours[\array_rand($colours)],
            'price' => \rand(20000, 10000)*1.1,
            'plate' => \chr(rand(65,90)) . \chr(rand(65,90)) . \rand(10, 20) . " " . \chr(rand(65,90)) . \chr(rand(65,90)) . \chr(rand(65,90)),
            'doors' => \rand(3, 5),
            'transmission' => $transmissions[\array_rand($transmissions)],
            'fuel' => $fuel[\array_rand($fuel)]
          ]);
        }
    }
}
