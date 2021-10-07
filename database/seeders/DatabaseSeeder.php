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

        GruposCidade::all()->each(function($grupo){
            Campanha::factory()->state(function() use ($grupo){
                return [
                    'grupo_id' => $grupo->id
                ];
            })->has(
                DescontoProduto::factory()->count(random_int(2,5))->state(function(){
                    return [
                        'produto_id' => Produto::inRandomOrder()->first()
                    ];
                })->has(Desconto::factory())
            )->create();
        });

        DescontoProduto::all()->each(function($dp){
            $dsc = Desconto::where('desconto_produto_id', $dp->id)->first()->valor;
            $vl = Produto::find($dp->produto_id)->valor;
            $dp->valor = (1 - $dsc)  * $vl;
            $dp->save();
        });
    }
}
