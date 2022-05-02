<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->realTextBetween(),
            'user_id' => $this->faker->numberBetween(1, 11),
            'ad_id' => $this->faker->numberBetween(101046, 102045),
        ];
    }
}
