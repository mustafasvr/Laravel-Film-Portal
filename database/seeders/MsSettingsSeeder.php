<?php

namespace Database\Seeders;

use App\Models\Admin\Settings;
use App\Models\Admin\SettingsGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $seo_id = SettingsGroup::where('group_url','seo')->first();
        $options_id = SettingsGroup::where('group_url','options')->first();


        Settings::create([
            'group_id' => $options_id->group_id,
            'settings_name' => 'debugMode',
            'settings_value' => false,
            'settings_type' => 'boolen',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $options_id->group_id,
            'settings_name' => 'debugModeText',
            'settings_value' => 'Üzgünüz, web sitemiz şu anda bakım nedeniyle kapalıdır. En kısa sürede tekrar hizmetinizde olacağız. Anlayışınız için teşekkür ederiz.',
            'settings_type' => 'textarea',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'title',
            'settings_value' => 'Mezuniyet Film Portal Projesi',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'shortName',
            'settings_value' => 'MFPP',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);


        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'logo',
            'settings_value' => Null,
            'settings_type' => 'file',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'favicon',
            'settings_value' => Null,
            'settings_type' => 'file',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'description',
            'settings_value' => 'PHP tabanlı apiler ile hazırlanmış film portal projesi.',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'author',
            'settings_value' => 'MustafaseveR',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);


        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'language',
            'settings_value' => 'tr',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);


        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'timezone',
            'settings_value' => 'Europe/Istanbul',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);

        Settings::create([
            'group_id' => $seo_id->group_id,
            'settings_name' => 'copyright',
            'settings_value' => 'MFPP',
            'settings_type' => 'text',
            'settings_delete' => false,
        ]);







      


    }
}
