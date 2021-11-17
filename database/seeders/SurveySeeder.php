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
        $clients = \App\Models\Clients\Client::all();

        $clients->each(function($client) {
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
                        'client_id' => $client->id,
                        'tenant_id' => $client->tenant_id
                    ]);
        });
    }
}
