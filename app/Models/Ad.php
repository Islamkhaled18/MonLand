<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $table = "ads";
    protected $fillable = ['name','image'];

    public function getImageUrlAttribute(){
        if($this->image){
            return asset('images/' . $this->image);
        }
        return asset('images/default.png');
    }
}
