<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->delete();

        $attributes = [
            [
            'id' => 1,
            'name' => 'اللون', 
            ],
            [
            'id' => 2,
            'name' => 'الوزن', 
            ]

        ];

        foreach($attributes as $attribute){
            Attribute::create($attribute);
        }

    }
}
