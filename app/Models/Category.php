<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ="categories";
    protected $fillable = ['name','parent_id'];
    public function scopeParent($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeChild($query)
    {
        return $query->where('parent_id', '!=', null);
    }

    public function _parent()
    {
        return $this->belongsTo(Self::class,'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Self::class,'parent_id');
    }
    

}
