<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;

    protected $table = 'product_colors';
    protected $fillable = ['name','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id')->withDefault();
    }
}
