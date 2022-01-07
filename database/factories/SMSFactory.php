<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SMSFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $r=rand(1,10);
        return [
            'name' => $this->faker->name(),
            'number' => $this->faker->phoneNumber(),
            'msg' => $this->faker->text(),
            'status' => $r>=8 ,
        ];
    }
}
