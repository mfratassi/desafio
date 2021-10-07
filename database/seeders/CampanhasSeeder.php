<?php

namespace Database\Seeders;

use App\Models\Campanha;
use App\Models\Desconto;
use Illuminate\Database\Seeder;

class CampanhasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Campanha::factory()
            ->has(Desconto::factory())
            ->create();
    }
}
