<?php

namespace Database\Factories;

use App\Models\GruposCidade;
use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

class GruposCidadeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GruposCidade::class;

    private static $groupCount = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => "Grupo ". self::$groupCount++
        ];
    }
}
