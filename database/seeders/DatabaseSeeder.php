<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            // Set up the users
            TenantSeeder::class,
            UserSeeder::class,

            // Mock up a crm
            ClientSeeder::class,
            ContactSeeder::class,
            GroupSeeder::class,

            // Now set up the surveys, sections and questions in SurveySeeder
            SurveySeeder::class,
            QuestionSeeder::class,

            // Now mock some responses to surveys
            // ResponseSeeder::class,

            // Mocks up a membership site
            // CourseSeeder::class,
            // ModuleSeeder::class,
            // PostSeeder::class,
        ]);
    }
}
