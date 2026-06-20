<?php

namespace Database\Seeders;

use App\Models\Opportunity;
use Illuminate\Database\Seeder;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opportunity::firstOrCreate(
            ['title' => 'TAGDev 2.0 Scholarship'],
            [
                'type' => 'scholarship',
                'status' => 'open',
                'summary' => 'Apply now for the 2026/2027 TAGDev 2.0 scholarship at the University of Bamenda. This opportunity supports academically competent students with financial need and encourages females, refugees, internally displaced persons, and applicants with disabilities to apply.',
                'is_published' => true,
            ]
        );

        Opportunity::factory()->count(5)->create();
    }
}
