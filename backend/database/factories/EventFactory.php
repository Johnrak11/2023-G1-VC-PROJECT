<?php

namespace Database\Factories;

use App\Models\Categories;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $organizer = User::inRandomOrder()->first();
        $category = Categories::inRandomOrder()->first();
        return [
            'name' => $this->faker->unique()->sentence(),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'location' => $this->faker->sentence(),
            'image' => $this->faker->image(),
            'venue' => $this->faker->sentence(),
            'price'=> $this->faker->numberBetween(2,20),
            'organizer_id' => $organizer->id,
            'category_id' => $category->id,
            
        ];
    }
}
