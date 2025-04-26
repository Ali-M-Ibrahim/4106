<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{

    protected $model=Teacher::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'first_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
             'email'=>fake()->safeEmail(),
            'telephone'=>fake()->phoneNumber(),
            'address'=>fake()->address(),
            'url'=>fake()->image()


        ];
    }
}
