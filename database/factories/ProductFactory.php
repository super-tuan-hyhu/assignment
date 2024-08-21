<?php

namespace Database\Factories;

use App\Models\Caterogy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Caterogy::all()->random()->id,
            'name' => $this->faker->word,
            'price_old' => $this->faker->randomFloat(2,1,100),
            'price_new' => $this->faker->randomFloat(2,1,100),
            'description' => $this->faker->paragraph(),
        ];
    }
}
