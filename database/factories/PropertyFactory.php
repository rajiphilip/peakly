<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $total_no_of_units = $this->faker->numberBetween(10, 25);
        $units_sold = $this->faker->numberBetween(1, 9);
        $available_units = $total_no_of_units - $units_sold ;
        $status = $this->faker->randomElement(['On sale', 'Sold Out']);

        return [
            'user_id' => User::get()->random()->id,
            'property_name' => $this->faker->company(),
            'description' => $this->faker->paragraph(10),
            'unit_price' => $this->faker->numberBetween(100000, 250000),
            'total_no_of_units' => $total_no_of_units,
            'available_units' => $available_units,
            'units_sold' => $units_sold,
            'status' => $status,
            'brochure' => $this->faker->imageUrl(),
            'image' => $this->faker->imageUrl(),
        ];
    }
}