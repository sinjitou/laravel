<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Password>
 */
class PasswordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();

        return [
            'site' => fake()->domainName(),
            'login' => fake()->userName(),
            'password' => fake()->password(),
            'user_id' => fake()->randomElement($userIds),
        ];
        
    }
}