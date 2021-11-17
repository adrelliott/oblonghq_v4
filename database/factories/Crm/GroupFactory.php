<?php

namespace Database\Factories\Crm;

use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{

     /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Crm\Group::class;

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
