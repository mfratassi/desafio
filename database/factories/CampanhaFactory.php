<?php

namespace Database\Factories;

use App\Models\Campanha;
use App\Models\Desconto;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampanhaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Campanha::class;

    static $campanhaCount = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Campanha ' . self::$campanhaCount++
        ];
    }

}
