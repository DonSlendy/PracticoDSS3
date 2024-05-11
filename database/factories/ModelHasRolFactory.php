<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ModelHasRol>
 */
class ModelHasRolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'role_id' => $this->faker->role_id(),
            'model_type' => $this->faker->model_type(),
            'model_id' => $this->faker->model_id(),
        ];
    }
}
