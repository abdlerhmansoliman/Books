<?php

namespace Database\Factories;

use App\Models\Book;
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
            'title' => $this->faker->sentence,
            'auth_name' => $this->faker->name,
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'description' => fake()->text(200),
            'pages' => $this->faker->numberBetween(50, 500),
            'publication_year' => $this->faker->year,
        ];
    }
    public function configure():static
    {
        return $this->afterCreating(function(Book $book){
            $book->uploads()->create([
                'type'=>'pdf',
                'path'=>$this->faker->imageUrl(),   
            ]);
            $book->uploads()->create([
                'type'=>'image_cover',
                'path'=>$this->faker->imageUrl(),   
            ]);
        });
    }
}
