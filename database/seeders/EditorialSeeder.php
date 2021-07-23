<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Editorial;


class EditorialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Editorial::create([
            'name' => 'DC Comics',
            'fundador' => 'Malcolm Wheeler-Nicholson',
            'fecha_fundacion' => 1934,
        ]);

        Editorial::create([
            'name' => 'Marvel Comics',
            'fundador' => 'Martin Goodman',
            'fecha_fundacion' => 1939,
        ]);
    }
}
