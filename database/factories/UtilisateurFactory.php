<?php

namespace Database\Factories;

use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UtilisateurFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Utilisateur::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->lastname,
            'firstname' => $this->faker->firstName,
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}
