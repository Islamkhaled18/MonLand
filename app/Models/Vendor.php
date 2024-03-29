<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendors";
    protected $fillable = ['vendor_name', 'exhange_status', 'delivery_status', 'country', 'delivery_time',

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function carts()
    {
        return $this->hasManyThrough(Cart::class, Product::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
