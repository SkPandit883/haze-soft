<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department_id' => 1,
            'name' => $this->faker->name,
            'employee_number' => $this->faker->randomNumber(),
            'email' => $this->faker->email(),
            'contact' => $this->faker->e164PhoneNumber,
            'designation' => $this->faker->jobTitle
        ];
    }
}
