<?php

namespace Database\Seeders;

use App\Models\PressRelease;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PressReleaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        PressRelease::factory()->count(8)->create();
    }
}
