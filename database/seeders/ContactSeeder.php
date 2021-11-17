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
        $companies = \App\Models\Crm\Company::all();

        $companies->each(function($company) {
            \App\Models\Crm\Contact::factory(150)
                ->create([
                    'company_id' => $company->id
                ]);
        });
    }
}
