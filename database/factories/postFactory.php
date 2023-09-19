<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = ['yangon', 'mandalay', 'naypyidaw', 'monwya', 'pyay', 'mawlamyine'];
        $index = array_rand($city);
        return [
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->paragraph(15),
            'price' => rand(2500, 600),
            'address' => $city["$index"],
            'rating' => rand(0, 5)
        ];
    }
}