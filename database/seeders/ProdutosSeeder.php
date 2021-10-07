<?php

namespace Database\Seeders;

use App\Models\Campanha;
use App\Models\Desconto;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produto::factory()
            ->count(random_int(5,20))
            ->create();
    }
}
