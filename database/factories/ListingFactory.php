<?php

namespace Database\Factories;

use App\Models\Listings;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    protected $model = Listings::class;

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
            'cover' => $this->faker->,
            'stock',
            'price'
        ];
    }
}
