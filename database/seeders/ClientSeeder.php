<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\Admin\User::all();

        $users->each(function($user) {
            \App\Models\Clients\Client::factory(3)->create([
                'tenant_id' => $user->tenant_id
            ]);
        });
    }
}
