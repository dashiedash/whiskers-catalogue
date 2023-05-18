<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class BookFactory extends Factory
{
    // Based on the Colon Classification system
    public const GENRES = ['Generalia', 'Universe of Knowledge', 'Library Science', 'Book science', 'Journalism', 'Natural Science', 'Mathematics', 'Physics', 'Engineering', 'Chemistry', 'Technology', 'Biology', 'Geology', 'Botany', 'Agriculture', 'Zoology', 'Medicine', 'Useful arts', 'Fine arts', 'Literature', 'Linguistics', 'Religion', 'Philosophy', 'Psychology', 'Education', 'Geography', 'History', 'Political Science', 'Economics', 'Sociology', 'Law'];

    public function definition(): array
    {
        return [
            'author_last_name' => $this->faker->lastName,
            'author_first_name' => $this->faker->firstName,
            'publish_year' => $this->faker->year($max = 'now'),
            'title' => $this->faker->sentence($nbWords = 3, $variableNbWords = true),
            'subtitle' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'genre' => $this->faker->randomElement(BookFactory::GENRES),
            'publisher' => $this->faker->company,
            'publish_city' => $this->faker->city,
            'publish_state' => $this->faker->state,
            'publish_country' => $this->faker->country,
            'description' => $this->faker->paragraph(5),
            'stock' => $this->faker->numberBetween($min = 0, $max = 50),
            'isbn' => $this->faker->numberBetween($min = 1000000000, $max = 9999999999),
            'price' => $this->faker->numberBetween($min = 10, $max = 200),
        ];
    }
}
