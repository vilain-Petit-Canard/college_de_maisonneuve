<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ville;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiant>
 */
class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'id' => User::inRandomOrder()->limit(100)->first()->id,  
        'adresse' => $this->faker->address,
        'telephone' => $this->faker->e164PhoneNumber,
        'date_de_naissance' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
        'ville_id' => Ville::inRandomOrder()->limit(15)->first()->id
        ];
    }
}
