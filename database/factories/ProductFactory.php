<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "cover" => "https://picsum.photos/seed/".fake()->randomNumber(5, false)."/150",
            "title" => fake()->sentence(),
            "artist" => fake()->name(),
            "date" => fake()->dateTimeBetween('2010-01-01', Carbon::now())->format('d-m-Y'),
            "genre" => fake()->randomElement(["Pop", "Hip Hop", "Rock", "Metal", "Electronics"]),
            "format" => fake()->randomElement(["CD", "Vinyl", "Casette", "Digital download"]),
        ];
    }
}
