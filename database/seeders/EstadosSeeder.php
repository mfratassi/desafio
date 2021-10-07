<?php

namespace Database\Seeders;

use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{

    protected $estados = array( "AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RO", "RS", "RR", "SC", "SE", "SP", "TO" );

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [];
        foreach ($this->estados as $est) {
            array_push($estados, [
                'nome' => $est
            ]);
        }

        foreach($estados as $estado){
            Estado::create($estado);
        }
    }
}
