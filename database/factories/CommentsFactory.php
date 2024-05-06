<?php

namespace Database\Factories;

use App\Models\BlogAdd;
use App\Models\UserLogin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id'=>UserLogin::get()->random()->id,
            'post_id'=>BlogAdd::get()->random()->id,
            'comment'=>$this->faker->paragraph(1),

        ];
    }
}
