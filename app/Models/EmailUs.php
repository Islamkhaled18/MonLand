<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailUs extends Model
{
    use HasFactory;

    protected $table = "email_us";

    protected $fillable = ['user_id'];

    public function user(){
        return $this->belongsTo(User::class)->withDefault();
    }
}
