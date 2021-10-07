<?php

namespace Database\Factories;

use App\Models\Cidade;
use App\Models\Estado;
use Database\Seeders\EstadosSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;


class CidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cidade::class;
    
    static $cidadeCount = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Cidade ' . self::$cidadeCount++, 
            'estado_id' => $this->faker->numberBetween(1,27)
        ];
    }
}
