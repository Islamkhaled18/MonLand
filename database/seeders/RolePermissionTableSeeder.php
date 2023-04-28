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
        DB::table('role_permissions')->delete();

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

            ///////////////////////////////////////////////////////////////////////////
            [
                'role_id' => 1,
                'permission' => 'mainCategories',
            ],
            [
                'role_id' => 1,
                'permission' => 'mainCategories.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'mainCategories.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'mainCategories.destroy',
            ],


            //////////////////////////////////////////////////////////////
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


            ///////////////////////////////////////////////
            [
                'role_id' => 1,
                'permission' => 'productColors',
            ],
            [
                'role_id' => 1,
                'permission' => 'productColors.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'productColors.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'productColors.destroy',
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
                'permission' => 'productSizes',
            ],
            [
                'role_id' => 1,
                'permission' => 'productSizes.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'productSizes.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'productSizes.destroy',
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
            [
                'role_id' => 1,
                'permission' => 'DeliveryPolicy',
            ],
            [
                'role_id' => 1,
                'permission' => 'DeliveryPolicy.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'DeliveryPolicy.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'DeliveryPolicy.destroy',
            ],

            [
                'role_id' => 1,
                'permission' => 'ads',
            ],
            [
                'role_id' => 1,
                'permission' => 'ads.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'ads.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'ads.destroy',
            ],
            [
                'role_id' => 1,
                'permission' => 'emailUs',
            ],
            [
                'role_id' => 1,
                'permission' => 'emailUs.destroy',
            ],
            [
                'role_id' => 1,
                'permission' => 'governorate',
            ],
            [
                'role_id' => 1,
                'permission' => 'governorate.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'governorate.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'governorate.destroy',
            ],
            [
                'role_id' => 1,
                'permission' => 'coupons',
            ],
            [
                'role_id' => 1,
                'permission' => 'coupons.create',
            ],
            [
                'role_id' => 1,
                'permission' => 'coupons.edit',
            ],
            [
                'role_id' => 1,
                'permission' => 'coupons.destroy',
            ],





        ];

        foreach ($rolesPermissions as $rolesPermission) {
            RolePermission::create($rolesPermission);
        }
    }
}
