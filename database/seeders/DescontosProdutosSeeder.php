<?php

namespace Database\Seeders;

use App\Models\Campanha;
use App\Models\Desconto;
use App\Models\DescontoProduto;
use App\Models\GruposCidade;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class DescontosProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GruposCidade::all()->each(function($grupo){
            Campanha::factory()->state(function() use ($grupo){
                return [
                    'grupo_id' => $grupo->id
                ];
            })->has(
                DescontoProduto::factory()->count(random_int(0,4))->state(function(){
                    return [
                        'produto_id' => Produto::inRandomOrder()->first()
                    ];
                })->has(Desconto::factory())
            )->create();
        });

        DescontoProduto::all()->each(function($dp){
            $dsc = Desconto::where('desconto_produto_id', $dp->id)->first()->valor ?: 0.0;
            $vl = Produto::find($dp->produto_id)->valor;
            $dp->valor = (1 - $dsc)  * $vl;
            $dp->save();
        });
    }
}
