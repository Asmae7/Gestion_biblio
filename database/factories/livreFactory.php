<?php

namespace Database\Factories;

use App\Models\Livre;
use Illuminate\Database\Eloquent\Factories\Factory;

class LivreFactory extends Factory
{
    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence,
            'annee_pub' => $this->faker->year,
            'nombre_de_pages' => $this->faker->numberBetween(50, 500),
            'auteur_id' => function () {
                return \App\Models\Auteur::factory()->create()->id;
            },
        ];
    }
}

