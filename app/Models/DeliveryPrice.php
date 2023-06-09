<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPrice extends Model
{
    use HasFactory;

    protected $table = "delivery_prices";
    protected $fillable = [
        'vendor_id',
        'governorate_id',
        'price',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id')->withDefault();
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class, 'governorate_id')->withDefault();
    }
}
