<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\str;
use App\Models\post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->text(200),
            'description' => $this->faker->text(100),
            'photo' => $this->faker->image('public/upload', 500, 600, null, false),

        ];
    }
}
