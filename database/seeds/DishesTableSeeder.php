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
        $names1 = ["Spaghetti allo scoglio", "Pasta alla carbonara", "Salmon Salad", "Chicken Salad", " La Norma", "Acqua 50 cl", "Coca cola 45cl", "Birra 33cl", "Pennete panna e salmone", "Taco Salad", "Pasta Salad"];
        $images1 = [];
        $ingred1 = [
            "Spaghetti, gamberi, cozze, arsele, pomodoro",
            "Spaghetti, guanciale, uova, pecorino, sale, pepe",
            "Salmone marinato, menta, avocado, mango, Edamame, germogli di soia",
            "Pollo, pomodori, mais, mozzarella",
            "Caserecce alla norma, pomodoro, melanzane, ricotta salata, basilico",
            "",
            "",
            "Malto d'orzo, luppolo, lievito, acqua",
            "Pennete, panna, salmone, erba cipollina",
            "Carne lessa, pomodori ciliegini, lattuga romana, avocado",
            "Fusilli, pomodori, peperoni rossi, pomodori, basilico, olio extra vergine d'oliva"
        ];
        $category1 = [2, 2, 3 ,3 , 2, 13, 13 , 13 , 2 , 3, 2 ];
        $gluten_free1 = [0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0 ];
        $vegetarian1 = [0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 1 ];
        $vegan1 = [0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0];

        for ($i=0; $i <= count($names1) - 1 ; $i++) {

            $newDish = new Dish;
            $newDish->name = $names1[$i];
            $newDish->img = "";
            $newDish->description = $ingred1[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->category_id = $category1[$i];
            $newDish->restaurant_id = 1;
            $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
            $newDish->gluten_free = $gluten_free1[$i];
            $newDish->vegetarian = $vegetarian1[$i];
            $newDish->vegan = $vegan1[$i];
            $newDish->availability = true;

            $newDish->save();
        }

        /* RISTORANTE 2 */

        $names2 = ["California Tobiko","Crunchy roll", "Futomaki", "Lemon roll", "Nigiri avocado", "Nigiri ebi", "Nigiri salmone", "Temaki", "Tuna sandwich", "Princess roll", "Uramaki vegetariano"];
        $images2 = [];
        $ingred2 = [
            "Riso, alga, avocado, ravanello, cetriolo, surimi (pesce tritato), ebi (gambero), tamago (frittata d’uovo), tobiko (uova di pesce)",
            "Riso, alga, salmone, avocado, sesamo, cipolla croccante",
            "riso, alga, salmone, tonno, avocado, cetriolo, ravanello, cipolla croccante",
            "riso, alga, salmone marinato, scorza di limone/lime",
            "Riso, avocado",
            "Riso, ebi (gambero)",
            "Riso, salmone",
            "riso, alga, salmone, cetriolo, avocado, ravanello.",
            "tonno affumicato, pesto di basilico, mozzarella fiordilatte, insalata iceberg",
            "riso, alga, salmone marinato, fragola",
            "riso, alga, cetriolo, avocado, ravanello, sesamo."
        ];
        $category2 = [5, 5, 5, 5, 5, 5, 5, 5, 9, 5, 5 ];
        $gluten_free2 = [1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1 ];
        $vegetarian2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ];
        $vegan2 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ];

        for ($i=0; $i <= count($names2) - 1 ; $i++) {

            $newDish = new Dish;
            $newDish->name = $names2[$i];
            $newDish->img = "";
            $newDish->description = $ingred2[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->category_id = $category2[$i];
            $newDish->restaurant_id = 2;
            $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
            $newDish->gluten_free = $gluten_free2[$i];
            $newDish->vegetarian = $vegetarian2[$i];
            $newDish->vegan = $vegan2[$i];
            $newDish->availability = true;

            $newDish->save();
        }

        /* RISTORANTE 3 */

        $names3 = ["Tandoori Chicken", "Grilled Paneer Tikka", "Garlic Chicken Tikka", "Lamb Tikka", "Hara Bhara Kebab", "Sheek Kebab", "Murgh Tangri Kebab", "Jinga Tikka", "Acqua 50cl"];
        $images3 = [];
        $ingred3 = [
            "Pollo marinato con erbe e spezie indiane, yogurt, ginger, aglio cucinato in Tandoori.",
            "Formaggio fresco servito con pomodoro marinato in erbe fresche.",
            "Pollo disossato grigliato",
            "Abbacchio marinato in yogurt naturale e spezie fresche, guarnito con insalata Tandoori",
            "Pollo marinato in spinaci e menta con le erbe",
            "Abbacchio disossato con spezie e cipolle.",
            "Cosce di pollo marinato con spezie Indiane servito con insalata Tandoori",
            "Pezzi di gamberi cucinati sul carbone e marinati con spezie indiane",
            ""
        ];
        $category3 = [2, 2, 2, 2, 2, 2, 2, 2, 2, 13 ];
        $gluten_free3 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ];
        $vegetarian3 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 1];
        $vegan3 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ];

        for ($i=0; $i <= count($names3) - 1 ; $i++) {

            $newDish = new Dish;
            $newDish->name = $names3[$i];
            $newDish->img = "";
            $newDish->description = $ingred3[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->category_id = $category3[$i];
            $newDish->restaurant_id = 3;
            $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
            $newDish->gluten_free = $gluten_free3[$i];
            $newDish->vegetarian = $vegetarian3[$i];
            $newDish->vegan = $vegan3[$i];
            $newDish->availability = true;

            $newDish->save();
        }

        // <!-- RISTORANTE 4_____________________________________________________________________________ -->

        $names4 = ["Vaschetta di Gelato 500g", "Vaschetta di Gelato 750g", "Vaschetta di Gelato 1kg", "Sacher", "Profiterole", "Tiramisù", "Cheesecake", "Cassatine", "Tripudio di Frutta", "Cannolo Siciliano", "Sfogliatella di Ricotta", "Caffè", "Acqua Naturale 50cl", "Acqua Frizzante 50cl", "Coca Cola 45cl "];
        $images4 = [];
        $ingred4 = [
            "Gelato da 500g con gusto a scelta",
            "Gelato da 750g con gusto a scelta",
            "Gelato da 1kg con gusto a scelta",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            "",
            ""
        ];
        $category4 = [12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 12, 13, 13, 13, 13];
        $gluten_free4 = [1, 1, 1, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 1 ];
        $vegetarian4 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ];
        $vegan4 = [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1 ];

        for ($i=0; $i <= count($names4) - 1 ; $i++) {

            $newDish = new Dish;
            $newDish->name = $names4[$i];
            $newDish->img = "";
            $newDish->description = $ingred4[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->category_id = $category4[$i];
            $newDish->restaurant_id = 4;
            $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
            $newDish->gluten_free = $gluten_free4[$i];
            $newDish->vegetarian = $vegetarian4[$i];
            $newDish->vegan = $vegan4[$i];
            $newDish->availability = true;

            $newDish->save();
        }

        // <!-- RISTORANTE 5_____________________________________________________________________ -->

        $names5 = ["Margherita classica", "Regina Margherita DOP", "Margherita gialla", "Margherita 2.0", "Piennolo e Bufala", "Ripieno al forno", "Fagotto Salsiccia e Porcini", "O’ Vesuvio", "4 Stagioni", "Wurstel e Patatine", "Marinara"];
        $images5 = [];
        $ingred5 = [
            "san marzano dop, fiordilatte, olio evo, basilico",
            "san marzano dop, bufala de 'IL GRANATORE', olio evo,
            basilico",
            "piennolo giallo dop, fiordilatte, olio evo, basilico",
            "piennolo del vesuvio dop, fiordilatte, olio evo, basilico",
            "piennolo del vesuvio dop, bufala de 'IL GRANATORE', olio evo, basilico",
            "calzone ripieno cotto al forno da farcire a piacere",
            "fiordilatte, salsiccia, porcini, origano,
            bordi del fagotto ripieni di mozzarella e ricotta",
            "disco di pasta farcito ½ calzone ripieno di ricotta e salame ½ pizza farcita con san marzano e fiordilatte",
            "san marzano dop, fiordilatte, basilico, olive caiazzane, carciofi,
            prosciutto cotto casa modena, funghi champignon freschi.",
            "san marzano dop, fiordilatte, wurstel,
            patatine fritte (surgelate)",
            "san marzano dop, olio evo ottobratico, basilico, aglio, origano"
        ];
        $category5 = [8, 8, 8, 8, 8, 8, 8, 8, 8, 8, 8 ];
        $gluten_free5 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 ];
        $vegetarian5 = [1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 1 ];
        $vegan5 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1 ];

        for ($i=0; $i <= count($names5) - 1 ; $i++) {

            $newDish = new Dish;
            $newDish->name = $names5[$i];
            $newDish->img = "";
            $newDish->description = $ingred5[$i];
            $newDish->price = number_format(rand(100, 1000) / 100, 2);
            $newDish->category_id = $category5[$i];
            $newDish->restaurant_id = 5;
            $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
            $newDish->gluten_free = $gluten_free5[$i];
            $newDish->vegetarian = $vegetarian5[$i];
            $newDish->vegan = $vegan5[$i];
            $newDish->availability = true;

            $newDish->save();
        }
        // <!-- RISTORANTE 6_____________________________________________________________________ -->
        $names6 = ["Piada Rustica", "Piada Cotto", "Piada Speck", "Piada Pancetta", "Piada Bresaola", "Piada Funghi", "Piada Squacquerone", "Piada Melanzane", "Piada Nutella", "Piada Gianduia", "Piada Gluten Free", "Piada Fritta","Acqua 0,50 cl", "Coca cola", "Birra 33cl"];
         $images6 = [];
         $ingred6 = [
            "Prosciutto di praga, scamorza affumicata, pomodorini",
            "Prosciutto cotto, fontina",
            "Speck, scamorza affumicata",
            "Pancetta piacentina, brie, rucola",
            "Bresaola valtellina, grana, rucola",
            "Funghi e fontina",
            "Squacquerone, rucola, olio evo",
            "Melanzane, cipolle, ceci, origano, olio evo",
            "Nutella, noccioline",
            "Crema di Gianduia, cannella",
            "Piada senza glutine, prosciutto cotto, fontina",
            "Ritagli di piadina fritti con salsa yogurt",
            "",
            "",
            ""
        
         ];
         $category6 = [11, 11, 11, 11, 11, 11, 11, 11, 12, 12, 11, 16, 13, 13, 14];
         $gluten_free6 = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, 1];
         $vegetarian6 = [0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1];
         $vegan6 = [0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 1];

         for ($i=0; $i <= count($names6) - 1 ; $i++) {

             $newDish = new Dish;
             $newDish->name = $names6[$i];
             $newDish->img = "";
             $newDish->description = $ingred6[$i];
             $newDish->price = number_format(rand(100, 1000) / 100, 2);
             $newDish->category_id = $category6[$i];
             $newDish->restaurant_id = 6;
             $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
             $newDish->gluten_free = $gluten_free6[$i];
             $newDish->vegetarian = $vegetarian6[$i];
             $newDish->vegan = $vegan6[$i];
             $newDish->availability = true;

             $newDish->save();
         };

         // <!-- RISTORANTE 7_____________________________________________________________________ -->

        $names7 = ["Patatine fritte classiche", "Patate con buccia fritte", "Anelli di cipolla fritti", "Hamburger classico", "Cheeseburger", "Hamburger con bacon", "Hamburger di Pollo", "Special Burger #1", "Special Burger #2", "Hot Dog", "Insalata mista", "Red Velvet Cake", "Cheesecake", "Acqua 0,50 cl", "Coca cola", "Birra 33cl"];
         $images7 = [];
         $ingred7 = [
            "Patate",
            "Patate con buccia, spezie",
            "Cipolla, farina",
            "Burger di manzo, salsa burger, cetriolini",
            "Burger di manzo, formaggio cheddar, salsa burger",
            "Burger di manzo, formaggio cheddar, bacon, cipolla fritta, salsa burger",
            "Burger di pollo, provola, salsa burger",
            "Burger di manzo, gorgonzola, confettura di cipolle, salsa tartara",
            "Burger di salsiccia, formaggio cheddar, salsa barbecue",
            "Wurstel di suino, senape, cipolla tritata, cetriolini",
            "Verdure miste",
            "Torta con farcitura alla vaniglia",
            "Mascarpone, ricotta, philadelphia, biscotti, guarnizione di cioccolato",
            "",
            "",
            ""
        
         ];
         $category7 = [7, 7, 7, 10, 10, 10, 10, 16, 16, 9, 4, 12, 12, 13, 13, 14];
         $gluten_free7 = [1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1];
         $vegetarian7 = [1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1];
         $vegan7 = [1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1];

         for ($i=0; $i <= count($names7) - 1 ; $i++) {

             $newDish = new Dish;
             $newDish->name = $names7[$i];
             $newDish->img = "";
             $newDish->description = $ingred7[$i];
             $newDish->price = number_format(rand(100, 1000) / 100, 2);
             $newDish->category_id = $category7[$i];
             $newDish->restaurant_id = 7;
             $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
             $newDish->gluten_free = $gluten_free7[$i];
             $newDish->vegetarian = $vegetarian7[$i];
             $newDish->vegan = $vegan7[$i];
             $newDish->availability = true;

             $newDish->save();
         };
         // <!-- RISTORANTE 8_____________________________________________________________________ -->
        $names8 = ["Involtini Primavera", "Wontons di gamberi", "Ravioli al vapore", "Riso alla cantonese", "Noodles di riso alla piastra con verdure", "Noodles di soia con carne", "Gamberoni con salsa chili", "Gamberi in agrodolce", "Pollo con mandorle", "Pollo al limone", "Pollo agrodolce", "Anatra croccante con verdure", "Gelato fritto al cioccolato", "Gelato fritto alla vaniglia", "Acqua 0,50 cl", "Coca cola", "Birra 33cl"];
         $images8 = [];
         $ingred8 = [
            "Pasta fillo, verdure miste a julienne",
            "Farina, gamberi",
            "Farina, tritato misto, spezie",
            "Riso, uovo, prosciutto, piselli",
            "Noodles di riso, verdure miste a julienne, uovo",
            "Noodles di soia, straccetti di maiale, cipolla, salsa di soia",
            "Gamberoni, salsa chili",
            "Gamberi, salsa agrodolce",
            "Pollo, salsa alle mandorle",
            "Pollo, salsa al limone",
            "Pollo, salsa agrodolce",
            "Anatra, salsa piccante, verdure miste a julienne",
            "Farina, gelato al cioccolato",
            "Farina, gelato alla vaniglia",
            "",
            "",
            ""
        
         ];
         $category8 = [7, 7, 2, 2, 2, 2, 3, 3, 3, 3, 3, 16, 12, 12, 13, 13, 13];
         $gluten_free8 = [0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1];
         $vegetarian8 = [1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1];
         $vegan8 = [1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1];

         for ($i=0; $i <= count($names8) - 1 ; $i++) {

             $newDish = new Dish;
             $newDish->name = $names8[$i];
             $newDish->img = "";
             $newDish->description = $ingred8[$i];
             $newDish->price = number_format(rand(100, 1000) / 100, 2);
             $newDish->category_id = $category8[$i];
             $newDish->restaurant_id = 8;
             $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
             $newDish->gluten_free = $gluten_free8[$i];
             $newDish->vegetarian = $vegetarian8[$i];
             $newDish->vegan = $vegan8[$i];
             $newDish->availability = true;

             $newDish->save();
         };
         // <!-- RISTORANTE 9_____________________________________________________________________ -->
        $names9 = ["Insalata Caprese", "Antipasto misto salumi e formaggi", "Fettuccine al ragù", "Trofie al pesto", "Gnocchi ai 4 formaggi", "Insalata con pollo grigliato", "Piadina con crudo, grana e rucola", "Scaloppine ai funghi", "Acqua 0,50 cl", "Coca cola", "Birra 33cl", "Vino Rosso 75cl", "Vino Bianco 75cl", "Pizza margherita", "Pizza Capricciosa", "Pizza 4 Formaggi", "Pizza Vegana", "Pizza Salsiccia e Funghi", "Pizza Dolce", "Tiramisù", "Cannolo alla ricotta"];
         $images9 = [];
         $ingred9 = [
            "Pomodorini, mozzarella di bufala, olio evo, origano",
            "Salame napoli, salame milano, prosciutto crudo, grana, brie, formaggio spalmabile, grissini, uva",
            "Fettuccine, ragù di maiale",
            "Trofie, pesto genovese",
            "Gnocchi, grana, emmenthal, gorgonzola, provola affumicata",
            "Insalata mista, petto di pollo grigliato, olio evo",
            "Piadina, prosciutto crudo, grana, rucola",
            "Fettine di vitello, riduzione ai funghi, funghi porcini",
            "",
            "",
            "",
            "Malto d'orzo, luppolo, lievito, acqua ",
            "",
            "",
            "Pomodoro, mozzarella, cuori di carciofo, prosciutto, funghi, piselli",
            "Pomodoro, mozzarella, provola affumicata, gorgonzola, emmenthal",
            "Pomodoro, zucchine grigliate, melanzane grigliate, olive",
            "Pomodoro, mozzarella, salsiccia, funghi",
            "Nutella, fiocchi di ricotta",
            "Savoiardi, crema al mascarpone, cacao amaro, caffè",
            "Ricotta, gocce di cioccolato"
         ];
         $category9 = [1, 1, 2, 2, 2, 3, 3, 3, 13, 13, 14, 15, 15, 8, 8, 8, 8, 8, 8, 12, 12];
         $gluten_free9 = [1, 0, 0, 0, 0, 1, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0];
         $vegetarian9 = [0, 1, 1, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 0, 1, 1, 1];
         $vegan9 = [0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0];

         for ($i=0; $i <= count($names9) - 1 ; $i++) {

             $newDish = new Dish;
             $newDish->name = $names9[$i];
             $newDish->img = "";
             $newDish->description = $ingred9[$i];
             $newDish->price = number_format(rand(100, 1000) / 100, 2);
             $newDish->category_id = $category9[$i];
             $newDish->restaurant_id = 9;
             $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
             $newDish->gluten_free = $gluten_free9[$i];
             $newDish->vegetarian = $vegetarian9[$i];
             $newDish->vegan = $vegan9[$i];
             $newDish->availability = true;

             $newDish->save();
         };
        // <!-- RISTORANTE 10_____________________________________________________________________ -->
        $names10 = ["Quesadilla", "Nachos con Queso", "Fajitas di Pollo", "Fajitas di Manzo", "Enchiladas di Pollo", "Enchiladas di Manzo", "Acqua 0,50 cl", "Coca cola", "Birra 33cl", "Tequila", "Sangria", "Nachos con Salsa Habanero Special", "Cocada"];
         $images10 = [];
         $ingred10 = [
             "Tortilla di farina bianca, formaggio",
             "Chips di mais, formaggio fuso, jalapenos",
             "Pollo, riso, fagioli, salsa queso",
             "Manzo, riso, fagioli, salsa queso",
             "Pollo, salsa, fagioli, formaggio",
             "Manzo, salsa, fagioli, formaggio",
             "",
             "",
             "Malto d'orzo, luppolo, lievito, acqua",
             "",
            "Vino Rosso, frutta a pezzi, spezie",
             "Chips di mais, salsa habanero speciale",
             "Cocco grattuggiato, latte, zucchero, uova, mandorle tritale."
         ];
         $category10 = [1, 1, 2, 2, 2, 2, 13, 13, 14, 13, 15, 16, 12];
         $gluten_free10 = [0, 1, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1];
         $vegetarian10 = [1, 1, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 1];
         $vegan10 = [0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 1, 1, 0];

         for ($i=0; $i <= count($names10) - 1 ; $i++) {

             $newDish = new Dish;
             $newDish->name = $names10[$i];
             $newDish->img = "";
             $newDish->description = $ingred10[$i];
             $newDish->price = number_format(rand(100, 1000) / 100, 2);
             $newDish->category_id = $category10[$i];
             $newDish->restaurant_id = 10;
             $newDish->slug = Str::slug($newDish->name,"-") ."-".$newDish->restaurant_id;
             $newDish->gluten_free = $gluten_free10[$i];
             $newDish->vegetarian = $vegetarian10[$i];
             $newDish->vegan = $vegan10[$i];
             $newDish->availability = true;

             $newDish->save();
         }

        
    }
}
