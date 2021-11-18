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
        // Get all companies with groups and contacts
        $companies = \App\Models\Crm\Company::with('contacts')->get();

        // Loop through each company and...
        $companies->each(function($company) {
            $groups = \App\Models\Crm\Group::factory(3)->create(['company_id' => $company->id]);
            $company->groups()->saveMany($groups);
            $contacts = $company->contacts;

            // Define some totals for later
            $totalContacts = $contacts->count();
            $totalGroups = $groups->count();

            if($totalContacts == 0 OR $totalGroups == 0) dd('something is zero');

            $numberOfContactsInEachChunk = intval($totalContacts / $totalGroups);

            // Split the contacts by number of groups
            $chunks = $contacts->chunk($numberOfContactsInEachChunk);
            $loopIndex = 0;

            // Loop through a group & add that chunk to the group
            foreach($groups as $group) {
                if($loopIndex < $totalGroups) {
                    $group->addMembers($chunks[$loopIndex]->pluck('id')->toArray());
                    $loopIndex++;
                }
            }
        });
    }
}
