<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";
    protected $fillable = [
        'name',
        'image',
    ];

    public function getImageUrlAttribute(){
        if($this->image){
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }
}
