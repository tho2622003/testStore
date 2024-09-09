<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            "title" => fake()->sentence(),
            "artist" => fake()->name(),
            "date"=>fake()->date("d-m-Y"),
            "genre"=>fake()->randomElement(["Pop","Hip Hop","Rock","Metal","Electronics"]),
            "format"=>fake()->randomElement(["CD","Vinyl","Casette","Digital download"]),
        ];
    }
}
