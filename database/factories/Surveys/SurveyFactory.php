<?php

namespace Database\Factories\Surveys;

use Illuminate\Database\Eloquent\Factories\Factory;

class SurveyFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Surveys\Survey::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(8),
            'created_at' => $this->faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now')
        ];
    }
}
