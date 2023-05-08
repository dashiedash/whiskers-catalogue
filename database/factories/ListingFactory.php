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
            /*
             $table->string('author_last_name');
            $table->string('author_first_name');
            $table->year('publish_year');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('publisher');
            $table->string('publish_place');
            $table->string('distributor');
            $table->longText('description');
            $table->string('cover');
            $table->integer('stock');
            $table->decimal('price', $precision = 6, $scale = 2);
            */

            'author_last-name' => $this->faker->lastName(),
        ];
    }
}
