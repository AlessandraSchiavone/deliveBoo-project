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
        //  $newRestaurant = new Restaurant;
        //  $newRestaurant->user_id = 1;
        //  $newRestaurant->name = "Da Mimmo";
        //  $newRestaurant->description = "La fantasia dei nostri chef non vi annoierà mai proponendo piatti sempre diversi e sfiziosi.
        //  La cura e la scelta degli ingredienti nostrani e genuini vi delizierà.
        //  Il servizio accurato, l'eleganza delle nostre sale vi faranno sentire a vostro agio.
        //  La disponibilità e la cordialità del personale vi coccoleranno.
        //  ";
        //  $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        //  $newRestaurant->phone_number = $faker->phoneNumber();
        //  $newRestaurant->location = "Roma";
        //  $newRestaurant->opening_time = "12:30";
        //  $newRestaurant->closure_time = "16:30";
        //  $newRestaurant->price_shipping = rand(0, 3);
        //  $newRestaurant->price_rating = rand(1, 3);
        //  $newRestaurant->img = "";
        //  $newRestaurant->save();
        //  $newRestaurant->cuisines()->attach(6);
        //  $newRestaurant->cuisines()->attach(8);

         /* Ristorante 2 Giapponese */
         $newRestaurant = new Restaurant;
         $newRestaurant->user_id = 2;
         $newRestaurant->name = "Sakura Fusion";
         $newRestaurant->description = "I nostri menu per pranzo, cena e take away di Sakura Fusion. Cucina asian fusion di qualità.";
         $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
         $newRestaurant->phone_number = $faker->phoneNumber();
         $newRestaurant->location = "Via dei Salici, 43";
         $newRestaurant->opening_time = "18:30";
         $newRestaurant->closure_time = "23:45";
         $newRestaurant->price_shipping = rand(0, 3);
         $newRestaurant->price_rating = rand(1, 3);
         $newRestaurant->img = "";
         $newRestaurant->save();
         $newRestaurant->cuisines()->attach(4);


        /* Ristorante 3 Indiano, Kebab */

        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 3;
        $newRestaurant->name = "Sirovi Indiano e Kebab";
        $newRestaurant->description = "Sirovi è specializzato in cucina indiana e kebab. Proporre ottimi naan e kebab di pollo è il punto di forza di questo ristorante.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Viale Europa, 11b";
        $newRestaurant->opening_time = "19:00";
        $newRestaurant->closure_time = "23:30";
        $newRestaurant->price_shipping =rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(7);
        $newRestaurant->cuisines()->attach(9);

                
        




    }

}
