<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;


    protected $table = "cartts";

    protected $fillable = ['uuid','product_id', 'user_id', 'quantity','size','price','color'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function vendors()
    {
        return $this->hasManyThrough('vendors', 'products', 'id', 'vendor_id');
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id', 'id')->withDefault();

    }
}
