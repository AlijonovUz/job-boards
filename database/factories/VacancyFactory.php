<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacancy>
 */
class VacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->jobTitle();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'company' => $this->faker->company(),
            'location' => $this->faker->city(),
            'description' => $this->faker->paragraph(3),
            'user_id' => User::factory()
        ];
    }
}
