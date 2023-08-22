<?php

namespace Database\Factories;

use App\Models\reseps;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reseps>
 */
class ResepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = reseps::class;
    public function definition(): array
    {
        return [
            'user_id' => fake(User::class),
            '' 
        ];
    }
}
