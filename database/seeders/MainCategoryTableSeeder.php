<?php

namespace Database\Seeders;

use App\Models\MainCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_categories')->delete();

        $mainCategories = [
            [
            'id' => 1,
            'name' => 'أزياء الرجال',
            ],
            [
            'id' => 2,
            'name' => 'أزياء النساء',
            ]
            ,
            [
            'id' => 3,
            'name' => 'الأطفال',
            ]
            ,
            [
            'id' => 4,
            'name' => 'إلكترونيات',
            ]
            ,
            [
            'id' => 5,
            'name' => 'الجمال',
            ]
            ,
            [
            'id' => 6,
            'name' => 'البيت والمطبخ',
            ]
        ];

        foreach($mainCategories as $mainCategory){
            MainCategory::create($mainCategory);
        }
    }
}
