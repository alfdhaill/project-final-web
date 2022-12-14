<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $admin = db::table('users')->pluck('id');

        return [
            'name' => fake()->unique()->word(),
            'description' => fake()->sentence(),
            'admin_id' => fake()->randomElement($admin)
        ];
    }
}
