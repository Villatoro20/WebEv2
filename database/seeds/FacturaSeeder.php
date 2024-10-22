<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Factura;

class FacturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factura::factory()->count(20)->create();
    }
}

