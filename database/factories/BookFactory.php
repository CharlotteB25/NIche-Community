<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(4, true),
            'slug' => fake()->slug(),
            'image_url' => 'https://picsum.photos/id/' . fake()->numberBetween(1, 100) . '/200/300',
            'author' => fake()->name(),
            'description' => fake()->paragraph(20),
            'genre_id' => fake()->numberBetween(1, 10)
        ];
    }
}
//this page is to create a factory for the book model to generate fake data for the database a factory is a class that defines the attributes of a model that should be used when generating fake data for the model. The factory class extends the Factory class provided by Laravel and defines a definition method that returns an array of attributes for the model. The definition method is used by the factory to generate fake data for the model. In this case, the BookFactory class defines a definition method that returns an empty array, which means that the factory will generate fake data with no attributes. We will update the definition method to define the attributes of the Book model that we want to generate fake data for.