<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $fillable =["image"];
    public function getImageUrlAttribute(){
        if($this->image){
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }
}
