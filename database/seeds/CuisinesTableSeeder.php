<?php

use Illuminate\Database\Seeder;
use App\Cuisine;

class CuisinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuisines = [
            'Caffetteria' ,
            'Cinese' ,
            'Dolci e dessert',
            'Giapponese' ,
            'Hamburger' ,
            'Healthy' ,
            'Indiano',
            'Italiano' ,
            'Kebab' ,
            'Messicano',
            'Piadina',
            'Pizza' 
        ];
        foreach ($cuisines as $cuisine) {
            $newCuisine = new Cuisine();
            $newCuisine->name = $cuisine;
            $newCuisine->save();
        }
    }
}
