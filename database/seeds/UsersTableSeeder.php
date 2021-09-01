<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $newUser = new User;
        // $newUser->name = "Team 5";
        // $newUser->email = "admin@mail.it";
        // $newUser->password = Hash::make('team5.2021');
        // $newUser->address = "Corso Vittorio Emanuele II, 273, Roma, 00186";
        // $newUser->vat_number = "14893275691";
        // $newUser->save();

        $newUser = new User;
        $newUser->name = "Bulma";
        $newUser->email = "bulma@mail.it";
        $newUser->password = Hash::make('bulma.2021');
        $newUser->address = "Via dei Salici, 43, 273, Roma, 00186";
        $newUser->vat_number = "18793275491";
        $newUser->save();

        $newUser = new User;
        $newUser->name = "Akash";
        $newUser->email = "akash@mail.it";
        $newUser->password = Hash::make('akash.2021');
        $newUser->address = "Viale Europa, 11b, Roma, 00186";
        $newUser->vat_number = "17893475394";
        $newUser->save();

        $newUser = new User;
        $newUser->name = "Carlos";
        $newUser->email = "carlos@mail.it";
        $newUser->password = Hash::make('carlos.2021');
        $newUser->address = "Corso Umberto I, 243, Roma, 00186";
        $newUser->vat_number = "84893275691";
        $newUser->save();

    }
}
