<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Editorial;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   //Factories
        User::factory(10)->create();
        //Seeders
        $this->call(EditorialSeeder::class);
        $this->call(HeroeSeeder::class);

        Editorial::factory(10)->create();

    }
}
