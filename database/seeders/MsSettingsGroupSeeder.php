<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\SettingsGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MsSettingsGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SettingsGroup::create([
            'group_name' => 'Site ayarları',
            'group_url' => 'options',
            'group_icon' => 'wrench',
            'group_desc' => 'Site ayarlarını burdan yapabilirsiniz.',
            'group_order' => 1,
            'group_delete' => false,
        ]);

        SettingsGroup::create([
            'group_name' => 'Seo ayarları',
            'group_url' => 'seo',
            'group_icon' => 'search',
            'group_desc' => 'Seo ayarlarını burdan yapabilirsiniz.',
            'group_order' => 2,
            'group_delete' => false,
        ]);

        SettingsGroup::create([
            'group_name' => 'E-posta ayarları',
            'group_url' => 'email',
            'group_icon' => 'envelope',
            'group_desc' => 'E-posta ayarlarını burdan yapabilirsiniz.',
            'group_order' => 3,
            'group_delete' => false,
        ]);


    }
}
