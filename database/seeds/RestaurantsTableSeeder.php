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
         $newRestaurant->location = "Roma";
         $newRestaurant->opening_time = "12:30";
         $newRestaurant->closure_time = "16:30";
         $newRestaurant->price_shipping = rand(0, 3);
         $newRestaurant->price_rating = rand(1, 3);
         $newRestaurant->img = "";
         $newRestaurant->save();
         $newRestaurant->cuisines()->attach(6);
         $newRestaurant->cuisines()->attach(8);

        //  /* Ristorante 2 Giapponese */
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


        // /* Ristorante 3 Indiano, Kebab */

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
        
        /* Ristorante 4 Caffetteria, Dolci e dessert */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 2;
        $newRestaurant->name = "BoolBucks";
        $newRestaurant->description = "BoolBucks è una famosa catena di caffetterie internazionale, famosa per i suoi cappuccini e dolcetti.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Via Lara Vel, 33";
        $newRestaurant->opening_time = "10:00";
        $newRestaurant->closure_time = "16:00";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(1);
        $newRestaurant->cuisines()->attach(3);
                
        // /* Ristorante 5 Pizza */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 1;
        $newRestaurant->name = "Pizzeria Vicolotto";
        $newRestaurant->description = "Le pizze di Pizzeria Vicolotto hanno una lievitazione di 48h con lievito madre e preparate con ingredienti locali e genuini.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Vicolo Città Vecchia, 2";
        $newRestaurant->opening_time = "18:15";
        $newRestaurant->closure_time = "23:10";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(12);

        // /* Ristorante 6 Piadina, Healthy */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 4;
        $newRestaurant->name = "La Piadineria del Centro";
        $newRestaurant->description = "Le nostre piadine vengono sfornate giornalmente con diverse farine disponibili. Vieni a provare pure le nostre insalate! Aperti anche a pranzo";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Stazione Centrale, 64a";
        $newRestaurant->opening_time = "13:30";
        $newRestaurant->closure_time = "23:30";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(6);
        $newRestaurant->cuisines()->attach(11);

        // /* Ristorante 7 Hamburger */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 4;
        $newRestaurant->name = "Burger Factory";
        $newRestaurant->description = "Deliziosi hamburger, fritti e specialità stagionali.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Via Caronda, 23";
        $newRestaurant->opening_time = "19:00";
        $newRestaurant->closure_time = "23:50";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(5);

        /* Ristorante 8 Cinese */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 2;
        $newRestaurant->name = "CHENG";
        $newRestaurant->description = "Da CHENG utilizziamo solamente prodotti di qualità e dall’origine garantita. I nostri piatti sono preparati al momento con meticolosa attenzione come la tradizione giapponese impone. La freschezza e la qualità dei nostri ingredienti sono la garanzia di piatti di qualità. Cheng unisce l’accurata selezione di ingredienti raffinati e di prima classe, tipica della tradizione gastronomica italiana, alla preparazione di piatti tipici giapponesi dal sapore eccezionale.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Via Lara Vel, 33";
        $newRestaurant->opening_time = "18:00";
        $newRestaurant->closure_time = "23:30";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(2);

        /* Ristorante 9 Italiano, Piadina, Pizza, Healthy */
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 1;
        $newRestaurant->name = "Mercato del Porto";
        $newRestaurant->description = "Mercato del Porto riunisce piccoli chioschi di ristoratori locali, specializzati in piatti italiani.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Porto Turistico, Lungomare 7";
        $newRestaurant->opening_time = "12:00";
        $newRestaurant->closure_time = "23:00";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(8);
        $newRestaurant->cuisines()->attach(11);
        $newRestaurant->cuisines()->attach(12);
        $newRestaurant->cuisines()->attach(6);

        /* Ristorante 10 Messicano*/
        $newRestaurant = new Restaurant;
        $newRestaurant->user_id = 3;
        $newRestaurant->name = "Carlito's";
        $newRestaurant->description = "Da Carlito's troverai tutto il meglio che offre la cucina messicana.";
        $newRestaurant->slug = Str::slug($newRestaurant->name, "-");
        $newRestaurant->phone_number = $faker->phoneNumber();
        $newRestaurant->location = "Via Cancun, 18";
        $newRestaurant->opening_time = "18:00";
        $newRestaurant->closure_time = "22:30";
        $newRestaurant->price_shipping = rand(0, 3);
        $newRestaurant->price_rating = rand(1, 3);
        $newRestaurant->img = "";
        $newRestaurant->save();
        $newRestaurant->cuisines()->attach(10);




    }

}
