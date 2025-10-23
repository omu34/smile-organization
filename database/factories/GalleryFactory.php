<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'category' => fake()->randomElement(['Nature', 'People', 'Architecture', 'Events']),
            'image_path' => 'https://picsum.photos/600/400?random=' . fake()->unique()->numberBetween(1, 200),
        ];
    }
}
