<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $name = $this->faker->name();

        return [

            'title' => $name,
            'slug' => Str::slug($name),
            'content' => $this->faker->paragraph(20),
            'description' => $this->faker->paragraph(4),
            'category_id' => $this->faker->randomElement([1,2,3]),
            'posted' => $this->faker->randomElement(['yes','not']),
            'image' => $this->faker->imageUrl(),





        ];
    }
}
