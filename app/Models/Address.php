<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = "addresses";
    protected $fillable = [
        'full_name',
        'Phone_1',
        'user_id',
        'Phone_2',
        'postal_code',
        'address_details',
        'governorate_id',
        'city_id',
        'building_no',
        'flat_no',
        'apartment_no',
        'special_mark',
        'is_default',
    ];

    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class)->withDefault();
    }
    public function city()
    {
        return $this->belongsTo(Governorate::class)->withDefault();
    }
}
