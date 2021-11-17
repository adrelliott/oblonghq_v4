<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make an easy to remember login
         \App\Models\Admin\User::factory()->create([
            'name' => 'Aladmin',
            'email' => 'al@admin.com',
            // 'is_superadmin' => TRUE,
            'tenant_id' => 1
         ]);

         // Now make some more users for each tenant for testing
        $tenants = \App\Models\Admin\Tenant::all();

        $tenants->each(function($tenant) {
            \App\Models\Admin\User::factory(10)->create([
                'tenant_id' => $tenant->id,
            ]);
        });
    }
}
