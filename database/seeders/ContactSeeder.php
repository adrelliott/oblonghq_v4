<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
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
            \App\Models\Clients\Contact::factory(150)
                ->create([
                    'client_id' => $client->id
                ]);
        });
    }
}
