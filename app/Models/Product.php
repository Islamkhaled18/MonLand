<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $guarded = [];

    protected $casts = [
        'in_stock' => 'boolean',
        'is_active' => 'boolean',
        'manage_stock' => 'boolean',

        'featured' => 'boolean',
        'deal_of_the_day' => 'boolean',
        'flash_sale' => 'boolean',
        'quick_request' => 'boolean',

    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'deleted_at',
    ];

    public function getActive()
    {
        return $this->is_active == 0 ? ' مفعل' : 'غير مفعل';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    public function getFeatured()
    {
        return $this->featured == 0 ? ' مميز' : 'غير مميز';
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', 1);
    }

    public function getDealOfTheDay()
    {
        return $this->deal_of_the_day == 0 ? 'عرض مميز لليوم فقط' : 'ليس من عروض اليوم';
    }

    public function scopeDealOfTheDay($query)
    {
        return $query->where('deal_of_the_day', 1);
    }

    public function getFlashSale()
    {
        return $this->flash_sale == 0 ? 'عروض فلاش' : 'ليس في عروض فلاش';
    }

    public function scopeFlashSale($query)
    {
        return $query->where('flash_sale', 1);
    }

    public function getQuickRequest()
    {
        return $this->quick_request == 0 ? ' ممكن الطلب السريع' : 'غير ممكن الطلب السريع';
    }

    public function scopeQuickRequest($query)
    {
        return $query->where('quick_request', 1);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class)->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id');
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
        return $total = $this->special_price ?? $this->price;
    }

    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class, 'product_id');
    }
    public function sizes()
    {
        return $this->hasMany(Productsize::class, 'product_id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id')->withDefault();
    }

    public function MainCategory()
    {
        return $this->belongsTo(MainCategory::class, 'mainCategory_id')->withDefault();
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products')
            ->using(OrderProduct::class)
            ->withPivot('price', 'quantity');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getImageUrlAttribute()
    {
        if ($this->cover_image) {
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }

    public function specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_id');
    }
}
