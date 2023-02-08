<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'phone',
        'gender',
        'terms',
        'provider',
        'provider_id',
        'provider_token',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'provider_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function contactUs()
    {
        return $this->hasOne(ContactUs::class)->withDefault();
    }

    public function emailUs()
    {
        return $this->hasOne(EmailUs::class)->withDefault();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class)->withDefault();
    }

    public function wishlist()
    {
        return $this->belongsToMany(Product::class, 'wishlists')->withTimestamps();
    }

    public function wishlistHas($productId)
    {
        return self::wishlist()->where('product_id', $productId)->exists();
    }

    public function comparelist()
    {
        return $this->belongsToMany(Product::class, 'compares')->withTimestamps();
    }

    public function comparelistHas($productId)
    {
        return self::comparelist()->where('product_id', $productId)->exists();
    }


    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function setProviderTokenAttribute($value){

         $this->attributes['provider_token'] = Crypt::encrypt($value);
    }

    public function getProviderTokenAttribute($value){
       
        return Crypt::decrypt($value);

    }
}
