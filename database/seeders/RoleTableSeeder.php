<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        $roles = [
            [
            'id' => 1,
            'name' => 'سوبر ادمن', 
            ],
            [
            'id' => 2,
            'name' => 'ادمن', 
            ]

        ];

        foreach($roles as $role){
            Role::create($role);
        }
    }
}
