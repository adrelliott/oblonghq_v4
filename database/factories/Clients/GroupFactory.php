<?php

namespace Database\Factories\Clients;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Clients\Group::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(4),
        ];
    }
}
