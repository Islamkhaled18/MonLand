<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'id' => 1,
                'firstName' => 'islam',
                'lastName' => 'khaled',
                'email' => 'islam.hegazy1807@gmail.com',
                'gender' => 'male',
                'terms' => true,
                'password' => bcrypt('123456789'),
                'phone' => '01015949894',
            ],
            [
                'id' => 2,
                'firstName' => 'aya',
                'lastName' => 'kamal',
                'email' => 'aya@gmail.com',
                'gender' => 'female',
                'terms' => true,
                'password' => bcrypt('123456789'),
                'phone' => '01144654650',
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
