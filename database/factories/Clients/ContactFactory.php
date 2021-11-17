<?php

namespace Database\Factories\Clients;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{

 /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Clients\Contact::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'type_id' => rand(1,4)
        ];
    }
}
