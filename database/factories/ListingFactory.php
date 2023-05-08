<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'author_last-name' => $this->faker->lastName,
            'author_first_name' => $this->faker->firstName,
            'publish_year' => $this->faker->year($max = 'now'),
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'subtitle' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'publisher' => $this->faker->company,
            'publish_city' => $this->faker->city,
            'publish_state' => $this->faker->state,
            'publish_country' => $this->faker->country,
            'description' => $this->faker->paragraph(5),
            'stock' => $this->faker->numberBetween($min = 0, $max = 50),
            'isbn' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'price' => $this->faker->numberBetween($min = 10, $max = 200)
        ];
    }
}
