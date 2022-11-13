<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $allCategories =  Category::parent()->select('id', 'name')->with(['childrens' => function ($q) {
            $q->select('id', 'parent_id', 'name');
            $q->with(['childrens' => function ($qq) {
                $qq->select('id', 'parent_id', 'name');
            }]);
        }])->get();
        return view('site.categories.allCategories', compact('allCategories'));
    }
}
