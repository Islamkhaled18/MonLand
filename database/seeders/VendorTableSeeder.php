<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->delete();

        $vendors = [
            [
            'id' => 1,
            'vendor_name' => 'مصنع الكفراوى',
            ],
            [
            'id' => 2,
            'vendor_name' => 'مصنع الجميزي',
            ]

        ];

        foreach($vendors as $vendor){
            Vendor::create($vendor);
        }
    }
}
