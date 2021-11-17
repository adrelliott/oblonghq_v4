<?php

namespace Database\Factories\Surveys;

use Illuminate\Database\Eloquent\Factories\Factory;

class SectionFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Surveys\Section::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(3),
            'description' => $this->faker->sentence(3),
            'body' => $this->faker->sentence(6),
        ];
    }
}
