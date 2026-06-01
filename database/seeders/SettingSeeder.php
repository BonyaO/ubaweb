<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // Contact group
            ['key' => 'footer.address',  'display_name' => 'Address',        'type' => 'textarea', 'group' => 'contact', 'order' => 1],
            ['key' => 'phone_line_1',    'display_name' => 'Phone Line 1',   'type' => 'text',     'group' => 'contact', 'order' => 2],
            ['key' => 'phone_line_2',    'display_name' => 'Phone Line 2',   'type' => 'text',     'group' => 'contact', 'order' => 3],
            ['key' => 'email',           'display_name' => 'Contact Email',  'type' => 'email',    'group' => 'contact', 'order' => 4],
            // Social group
            ['key' => 'facebook',  'display_name' => 'Facebook URL',  'type' => 'url', 'group' => 'social', 'order' => 1],
            ['key' => 'twitter',   'display_name' => 'Twitter URL',   'type' => 'url', 'group' => 'social', 'order' => 2],
            ['key' => 'instagram', 'display_name' => 'Instagram URL', 'type' => 'url', 'group' => 'social', 'order' => 3],
            ['key' => 'webmail',   'display_name' => 'Webmail URL',   'type' => 'url', 'group' => 'social', 'order' => 4],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
