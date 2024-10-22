<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Foto;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Foto::factory()->count(30)->create();
    }
}
