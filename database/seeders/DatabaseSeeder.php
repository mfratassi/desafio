<?php

namespace Database\Seeders;

use App\Models\Campanha;
use App\Models\CampanhaProduto;
use App\Models\Cidade;
use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\Estado;
use App\Models\GruposCidade;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(EstadosSeeder::class);
        $this->call(GruposCidadesSeeder::class);
        $this->call(ProdutosSeeder::class);
        $this->call(DescontosProdutosSeeder::class);
    }
}
