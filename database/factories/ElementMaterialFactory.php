<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElementMaterial>
 */
class ElementMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName,
            'active_status' => $this->faker->boolean,
            'sort_number' => $this->faker->randomNumber(),
            'label_active_status' => $this->faker->boolean,
        ];
    }
}
