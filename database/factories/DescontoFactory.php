<?php

namespace Database\Factories;

use App\Models\Desconto;
use Illuminate\Database\Eloquent\Factories\Factory;

class DescontoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desconto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2,0.0,0.30)
        ];
    }
}
