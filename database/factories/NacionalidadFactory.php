<?php

namespace Database\Factories;

use App\Models\Nacionalidad;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Nacionalidad>
 */
class NacionalidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model =Nacionalidad::class;

    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->randomElement((['Colombiano', 'Español', 'Canadiense'])),
            'Codigo_Pais' => $this->faker->unique()->randomDigitNotNull(),
            'user_id' => $this->faker->unique()->randomElement((['1', '2', '3', '4', '5']))
        ];
    }
}
