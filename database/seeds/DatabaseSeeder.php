<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminSeeder::class);

        //factory(App\User::class, 10)->create();
        //factory(App\Voiture::class, 10)->create();
        //factory(App\Reservation::class, 10)->create();
        //factory(App\Contrat::class, 10)->create();

    }
}
