<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;


    protected $table = "products";
    protected $guarded =[];
    
    protected $casts = [
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
        'manage_stock' => 'boolean',

    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'deleted_at',
    ];

    public function getActive()
    {
        return $this->is_active == 0 ? 'غير مفعل' : 'مفعل';
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function images(){
        return $this->hasMany(Image::class , 'product_id');
    }

    public function hasStock($quantity)
    {
        return $this->qty >= $quantity;
    }

    public function outOfStock()
    {
        return $this->qty === 0;
    }

    public function inStock()
    {
        return $this->qty >= 1;
    }
    public function getTotal($converted = true)
    {
        return $total =  $this->special_price ?? $this -> price;

    }
        
    public function options()
    {
        return $this->hasMany(Option::class, 'product_id')->withDefault();
    }
}
