<?php

namespace Database\Seeders;

use App\Models\Desconto;
use Illuminate\Database\Seeder;

class DescontosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desconto::factory()->count(random_int(5,10))->create();
    }
}
