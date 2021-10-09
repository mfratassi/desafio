<?php

namespace Database\Seeders;

use App\Models\Campanha;
use App\Models\Cidade;
use App\Models\Desconto;
use App\Models\GruposCidade;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class GruposCidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GruposCidade::factory(random_int(1,1))
            ->has(Cidade::factory()->count(random_int(1,2)))
        ->create();
    }
}
