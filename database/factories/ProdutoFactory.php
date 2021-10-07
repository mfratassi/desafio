<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    protected static $produtoCounter = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => 'Produto ' . self::$produtoCounter++,
            'sku' => $this->faker->randomNumber(5, true), 
            'valor' => $this->faker->randomFloat(2,50,100)
        ];
    }
}
