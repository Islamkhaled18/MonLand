<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();

        $admins = [
            [
                'id' => 1,
                'name' => 'Super Admin',
                'email' => 'super_admin@gmail.com',
                'password' => bcrypt('123456789'),
                'phone' => '01015949894',
                'role_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Islam Khaled',
                'email' => 'islam.khaled13a@gmail.com',
                'password' => bcrypt('123456789'),
                'phone' => '01015949894',
                'role_id' => null,
            ],

        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }

    }
}
