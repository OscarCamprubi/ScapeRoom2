<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends Factory
 */
class JocFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->sentence(4),
            'descripcio' => $this->faker->paragraph(1),
            'minJugadors' => $this->faker->numberBetween(1,20),
            'maxJugadors' => $this->faker->numberBetween('minJugadors',20),
        ];
    }
}
