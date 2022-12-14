<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Food>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tags = db::table('tags')->pluck('id');
        $category = db::table('categories')->pluck('id');

        return [
            'name' =>fake()->words(2, true),
            'price' =>fake()->randomNumber(4, false),
            'slug' => Str::random(6),
            // 'slug' => fake()->word(),
            'description' =>fake()->sentence(),
            'category_id'=>fake()->randomElement($category),
            'tag_id' =>fake()->randomElement($tags)
        ];
    }
}
