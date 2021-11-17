<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = \App\Models\Surveys\Section::all();

        $sections->each(function($section) {

            // Create some questions for each section
            $questions = \App\Models\Surveys\Question::factory(5)
                ->sequence(fn ($sequence) => ['order' => $sequence->index])
                ->create();

            // Now save the questions to the survey
            $section->addQuestions($questions->pluck('id')->toArray());


            $questions->each(function ($question) {
                // Create some answers for each question
                $answers = [
                    ['title' => 'Highly unlikely', 'value' => 1],
                    ['title' => 'Somewhat unlikely', 'value' => 2],
                    ['title' => 'Dont know', 'value' => 3],
                    ['title' => 'Somewhat likely', 'value' => 4],
                    ['title' => 'Highly likely', 'value' => 5],
                ];

                // Add the answers to each question
                $question->addAnswers($answers);
            });
        });
    }
}
