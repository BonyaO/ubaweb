<?php

namespace Database\Seeders;

use App\Models\SiteAlert;
use Illuminate\Database\Seeder;

class SiteAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiteAlert::firstOrCreate(
            ['title' => '2026/2027 Entrance Examination Registration Now Open'],
            [
                'description' => 'Registration for the 2026/2027 entrance examination is now open. Prospective students should register before the deadline to secure a seat.',
                'link_url' => route('contact'),
                'link_text' => 'Contact admissions',
                'is_active' => true,
            ]
        );

        SiteAlert::factory()->count(2)->create();
    }
}
