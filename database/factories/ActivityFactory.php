<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = fake()->dateTimeBetween(
            Carbon::now()->subYear(),
            Carbon::now(),
            'Asia/Tbilisi'
        );

        return [
            'amount' => fake()->numberBetween(1, 1500),
            'note' => fake()->word(),
            'category_id' => fake()->numberBetween(1, 20),
            'user_id' => 1,
            'created_at' => $date,
            'updated_at' => $date
        ];
    }
}
