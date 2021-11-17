<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = \App\Models\Crm\Company::all();

        $companies->each(function($company) {
            \App\Models\Surveys\Survey::factory(3)
                ->has(
                    \App\Models\Surveys\Section::factory()
                        ->sequence(fn ($sequence) => ['order' => $sequence->index])
                        ->count(4)
                        // ->has(\App\Models\Surveys\Question::factory()
                        //     ->sequence(fn ($q_sequence) => ['order' => $q_sequence->index])
                        //     ->count(6)
                        // )
                    )
                    ->create([
                        'company_id' => $company->id,
                        'tenant_id' => $company->tenant_id
                    ]);
        });
    }
}
