<?php

namespace Database\Factories;

use App\Models\Emprunt; // Assurez-vous d'importer le modèle Emprunt
use Illuminate\Database\Eloquent\Factories\Factory;

class EmpruntFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'livre_id'=>\App\Models\Livre::factory()->create()->id,
            'date_emprunt' => $this->faker->year,
            'date_retour' => $this->faker->year,
        ];
    }
}
