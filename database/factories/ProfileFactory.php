<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    
    public function definition(): array
    {
        
        return [
            'firstName' => $this->faker->firstName,
            'lastName' => $this->faker->lastName,
            'mobile' => $this->faker->phoneNumber,
            'city' => $this->faker->city,
            'shippingAddress' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),           
        ];
    }
}
