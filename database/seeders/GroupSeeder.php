<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
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
            $groups = \App\Models\Clients\Group::factory(3)->create([
                'client_id' => $client->id,
            ]);
        });
    }
}
