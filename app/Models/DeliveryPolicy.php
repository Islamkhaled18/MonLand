<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPolicy extends Model
{
    use HasFactory;

    protected $table = "delivery_policies";

    protected $fillable = ['policy'];
}
