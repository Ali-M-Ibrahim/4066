<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model= Post::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_name'=>fake()->name(),
            'author_telephone'=>fake()->phoneNumber(),
            'author_address'=>fake()->address(),
            'title'=>fake()->text(),
            'description'=>fake()->paragraph(),
            'nb_of_likes'=>fake()->randomDigit()
        ];
    }
}
