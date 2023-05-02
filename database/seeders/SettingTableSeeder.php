<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['key' => 'welcome_title', 'value' => 'اهلا بك في في موقعنا'],
            ['key' => 'welcome_subject', 'value' => 'رؤيتنا'],
            ['key' => 'content_question', 'value' => 'what is your vision?'],
            ['key' => 'content_answer', 'value' => 'my vision is what you want to be'],
            ['key' => 'our_vision', 'value' => 'Success Success Success'],
            ['key' => 'our_mission', 'value' => 'strugle strugle strugle strugle'],
            ['key' => 'address', 'value' => 'Dubai'],
            ['key' => 'email', 'value' => 'admin@info.com'],
            ['key' => 'phone', 'value' => '01015151515'],
            ['key' => 'telegram', 'value' => '01015151515'],
            ['key' => 'instgram', 'value' => 'https://www.instagram.com'],
            ['key' => 'facebook', 'value' => 'https://www.facebook.com'],
            ['key' => 'youtube', 'value' => 'https://www.youtube.com'],
            ['key' => 'twitter', 'value' => 'https://www.twitter.com'],
        ];

        DB::table('settings')->insert($data);

    }
}
