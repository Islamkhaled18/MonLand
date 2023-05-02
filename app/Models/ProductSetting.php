<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSetting extends Model
{
    use HasFactory;

    protected $table = "product_settings";
       protected $fillable = ['quick_request'];

    protected $casts = [
        'quick_request' => 'boolean',
    ];

    public function getQuickRequest()
    {
        return $this->quick_request == 1 ? ' ممكن الطلب السريع' : 'غير ممكن الطلب السريع';
    }

    public function scopeQuickRequest($query)
    {
        return $query->where('quick_request', 1);
    }
}
