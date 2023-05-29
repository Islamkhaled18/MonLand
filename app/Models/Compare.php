<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    use HasFactory;
    protected $table = 'comparees';

    protected $fillable = ['uuid', 'product_id','user_id'];



    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
