<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        $categories = [
            [
                'id' => 1,
                'name' => 'ملابس',
                'parent_id' => null,
                'mainCategory_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'ملابس اطفال',
                'parent_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'مكيرويف',
                'parent_id' => null,
                'mainCategory_id' => 4,
            ]

        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
