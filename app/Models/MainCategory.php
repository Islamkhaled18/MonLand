<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    use HasFactory;

    protected $table = "main_categories";
    protected $fillable = ['name'];

    public function categories(){
        return $this->hasMany(Category::class,'mainCategory_id');
    }
    
    public function products(){
        return $this->hasMany(Product::class,'mainCategory_id');
    }
}
