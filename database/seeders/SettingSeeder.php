<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->user_id = 1;
        $setting->name = 'config';
        $setting->value = json_encode([
            'versi' => '1.0.0-beta',
            'url'   => 'https://wijayacode.net/projects/com.wijayacode.swalayan',
            'fonnte_token' => 'YWCQKx!Y6--njsAyL-47'
        ]);
        $setting->save();

        $settings = Setting::get();

        Cache::put(Setting::CACHE_KEY,$settings);
    }
}
