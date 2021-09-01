<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti' ,
            'Primi' ,
            'Secondi',
            'Contorni',
            'Sushi',
            'Poke',
            'Fritti',
            'Pizze' ,
            'Panini',
            'Hamburger',
            'Piadine',
            'Dolci' ,
            'Bevande',
            'Birre',
            'Vini',
            'Specialità' 
        ];
        foreach ($categories as $category) {
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->save();
        }
    
    }
}
