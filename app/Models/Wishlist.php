<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'favorites';

    protected $fillable = ['uuid', 'product_id','user_id'];



    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

//     public function User()
//     {
//         return $this->belongsTo(User::class, 'user_id');
//     }

}
