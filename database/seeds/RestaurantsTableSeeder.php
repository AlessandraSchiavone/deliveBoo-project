<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;
use Illuminate\Support\Str;


class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
         /* Ristorante 1 Italiano, Healthy */
         $newRestaurant = new Restaurant;
         $newRestaurant->user_id = 1;
         $newRestaurant->name = "Da Mimmo";
         $newRestaurant->description = "La fantasia dei nostri chef non vi annoierà mai proponendo piatti sempre diversi e sfiziosi.
         La cura e la scelta degli ingredienti nostrani e genuini vi delizierà.
         Il servizio accurato, l'eleganza delle nostre sale vi faranno sentire a vostro agio.
         La disponibilità e la cordialità del personale vi coccoleranno.
         ";
         $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
         $newRestaurant->phone_number = $faker->phoneNumber();
         $newRestaurant->location = "Firenze";
         $newRestaurant->opening_time = rand(15, 18);
         $newRestaurant->closure_time = rand(22, 24);
         $newRestaurant->price_shipping = rand(0, 3);
         $newRestaurant->price_rating = rand(1, 3);
         $newRestaurant->img = "";
         $newRestaurant->save();
         $newRestaurant->cuisines()->attach(6);
         $newRestaurant->cuisines()->attach(8);


        /* Ristorante 2 Italiano, Healthy */
         $newRestaurant = new Restaurant;
         $newRestaurant->user_id = 1;
         $newRestaurant->name = "Mimmo";
         $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
         $newRestaurant->description = "La fantasia dei nostri chef non vi annoierà mai proponendo piatti sempre diversi e sfiziosi.
         La cura e la scelta degli ingredienti nostrani e genuini vi delizierà.
         ";
         $newRestaurant->phone_number = $faker->phoneNumber();
         $newRestaurant->location = "Firenze";
         $newRestaurant->opening_time = rand(15, 18);
         $newRestaurant->closure_time = rand(22, 24);
         $newRestaurant->price_shipping = rand(0, 3);
         $newRestaurant->price_rating = rand(1, 3);
         $newRestaurant->img = "";
         $newRestaurant->save();
         $newRestaurant->cuisines()->attach(6);
         $newRestaurant->cuisines()->attach(8);
        




    }

}
