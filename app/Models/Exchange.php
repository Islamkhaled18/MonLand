<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $table = "exchanges";
    protected $guarded = [];

    public function getImageUrlAttribute()
    {
        if ($this->bill_of_lading) {
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }
    public function getVideoUrlAttribute()
    {
        if ($this->product_video) {
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }


    public function getWhatsApp()
    {
        return $this->whatsApp == 0 ? 'ليس لديه واتساب' : 'لديه واتساب';
    }

    public function getOrder_type()
    {
        return $this->order_type == 0 ? 'استبدال' : 'استرجاع';
    }

    protected $dates = [
        'order_date',
    ];


}
