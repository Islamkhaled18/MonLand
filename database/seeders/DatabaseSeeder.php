<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(MainCategoryTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DeliveryPolicyTableSeeder::class);

    }
}
