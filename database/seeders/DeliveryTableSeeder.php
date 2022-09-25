<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->delete();

        $deliveries = [
            [
            'id' => 1,
            'governorate_name' => 'القاهره', 
            'delivery_price' => '50 جنيه مصري', 
            ],
            [
            'id' => 2,
            'governorate_name' => 'الجيزه', 
            'delivery_price' => '40 جنيه مصري', 
            ]

        ];

        foreach($deliveries as $delivery){
            Delivery::create($delivery);
        }
    }
}
