<?php

namespace Database\Seeders;

use App\Models\DeliveryPolicy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DeliveryPolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_policies')->delete();

        $delivery_policies = [
            [
            'id' => 1,
            'policy' => 'سياسة استرجاع الموقع', 
            ]

        ];

        foreach($delivery_policies as $delivery_policy){
            DeliveryPolicy::create($delivery_policy);
        }
    }
}
