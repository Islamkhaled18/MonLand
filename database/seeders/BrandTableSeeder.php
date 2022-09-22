<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $brands = [
            [
            'id' => 1,
            'name' => 'Niki', 
            
            ],
            [
            'id' => 2,
            'name' => 'ADIDAS', 
            ]

        ];

        foreach($brands as $brand){
            Brand::create($brand);
        }
    }
}
