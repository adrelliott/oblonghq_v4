<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $surveys = \App\Models\Surveys\Survey::all();

        $surveys->each( function($survey) {
            // Get all invited contacts

            // for each contact, get all questions for this survey
            $questions = \App\Models\Surveys\Question::where('survey_id', $survey->id)
                ->select('id')
                ->get();

            // Add random (1 = 5) integer as response


        );
    }
}
