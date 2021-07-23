<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Heroe;

class HeroeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Heroe::create([
            'name' => 'Batman',
            'identity' => 'Bruce Wayne',
            'power' => 500,
            'editorial_id' => 1,
        ]);

        Heroe::create([
            'name' => 'Spiderman',
            'identity' => 'Peter Parker',
            'power' => 100,
            'editorial_id' => 2,
        ]);

        Heroe::create([
            'name' => 'Superman',
            'identity' => 'Clark Kent',
            'power' => 600,
            'editorial_id' => 1,
        ]);

        Heroe::create([
            'name' => 'Aquaman',
            'identity' => 'Arthur Curry',
            'power' => 100,
            'editorial_id' => 1,
        ]);

        Heroe::create([
            'name' => 'Wonder Woman',
            'identity' => 'Diana',
            'power' => 600,
            'editorial_id' => 1,
        ]);
    }
}
