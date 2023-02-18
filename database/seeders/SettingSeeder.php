<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::factory()->count(1)->create();

        $setting = new Setting;
        $setting->user_id = 1;
        $setting->name = 'fonnte_token';
        $setting->value = 'YWCQKx!Y6--njsAyL-47';
        $setting->save();
    }
}
