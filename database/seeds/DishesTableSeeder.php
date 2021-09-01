<?php

use Illuminate\Database\Seeder;
use App\Dish;

class DishesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $names1 = ["Spaghetti allo scoglio", "Pasta alla carbonara", "Salmon Salad", "Chicken Salad", " La Norma", "Acqua 0,50 cl", "Coca cola", "Birra 33cl", "Pennete panna e salmone", "Taco Salad", "Pasta Salad"];
        // $images1 = [];
        // $ingred1 = [
        //     "Spaghetti, gamberi, cozze, arsele, pomodoro",
        //     "Spaghetti, guanciale, uova, pecorino, sale, pepe",
        //     "Salmone marinato, menta, avocado, mango, Edamame, germogli di soia",
        //     "Pollo, pomodori, mais, mozzarella",
        //     "Caserecce alla norma, pomodoro, melanzane, ricotta salata, basilico",
        //     "",
        //     "",
        //     "Malto d'orzo, luppolo, lievito, acqua",
        //     "Pennete, panna, salmone, erba cipollina",
        //     "Carne lessa, pomodori ciliegini, lattuga romana, avocado",
        //     "Fusilli, pomodori, peperoni rossi, pomodori, basilico, olio extra vergine d'oliva"
        // ];
        // $category1 = [2, 2, 3 ,3 , 2, 13, 13 , 13 , 2 , 3, 2 ];
        // $gluten_free1 = [0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0 ];
        // $vegetarian1 = [0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1 ];
        // $vegan1 = [0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0];

        // for ($i=0; $i <= count($names1) - 1 ; $i++) {

        //     $newDish = new Dish;
        //     $newDish->name = $names1[$i];
        //     $newDish->img = "";
        //     $newDish->description = $ingred1[$i];
        //     $newDish->price = number_format(rand(100, 1000) / 100, 2);
        //     $newDish->category_id = $category1[$i];
        //     $newDish->restaurant_id = 1;
        //     $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
        //     $newDish->gluten_free = $gluten_free1[$i];
        //     $newDish->vegetarian = $vegetarian1[$i];
        //     $newDish->vegan = $vegan1[$i];
        //     $newDish->availability = true;

        //     $newDish->save();
        // }
    }
}
