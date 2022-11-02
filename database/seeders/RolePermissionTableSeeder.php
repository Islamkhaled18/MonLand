<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->delete();

        $rolesPermissions = [
            [
            'role_id' => 1,
            'permission' => 'admins', 
            ],
            [
            'role_id' => 1,
            'permission' => 'admins.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'admins.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'admins.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'attributes', 
            ],
            [
            'role_id' => 1,
            'permission' => 'attributes.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'attributes.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'attributes.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'brands', 
            ],
            [
            'role_id' => 1,
            'permission' => 'brands.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'brands.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'brands.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'categories', 
            ],
            [
            'role_id' => 1,
            'permission' => 'categories.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'categories.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'categories.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'delivery', 
            ],
            [
            'role_id' => 1,
            'permission' => 'delivery.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'delivery.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'delivery.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'options', 
            ],
            [
            'role_id' => 1,
            'permission' => 'options.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'options.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'options.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'products', 
            ],
            [
            'role_id' => 1,
            'permission' => 'products.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'products.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'products.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'roles', 
            ],
            [
            'role_id' => 1,
            'permission' => 'roles.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'roles.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'roles.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'settings.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'vendors', 
            ],
            [
            'role_id' => 1,
            'permission' => 'vendors.create', 
            ],
            [
            'role_id' => 1,
            'permission' => 'vendors.edit', 
            ],
            [
            'role_id' => 1,
            'permission' => 'vendors.destroy', 
            ],
            [
            'role_id' => 1,
            'permission' => 'contactus', 
            ],
            [
            'role_id' => 1,
            'permission' => 'contactus.destroy', 
            ],
           

        ];

        foreach($rolesPermissions as $rolesPermission){
            RolePermission::create($rolesPermission);
        }
    }
}
