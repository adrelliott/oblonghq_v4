<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
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
            \App\Models\Crm\Company::factory(3)->create([
                'tenant_id' => $user->tenant_id,
                'stage_id' => rand(1,4)
            ]);
        });
    }
}
