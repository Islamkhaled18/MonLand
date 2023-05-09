<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSpecification extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'spec_key',
        'spec_value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
