<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'courseID'  => $this->faker->numberBetween(1, 10),
            'title'     => '請寫 ' . $this->faker->word,
            'content'   => $this->faker->sentence,
            'timestamp' => now(),
        ];
    }
}
