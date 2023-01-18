<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Governorate extends Model
{
    use HasFactory;

    protected $table = "governorates";

    protected $fillable = ['name', 'parent_id', 'price'];
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
        return $this->belongsTo(Self::class, 'parent_id');
    }

    public function childrens()
    {
        return $this->hasMany(Self::class, 'parent_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class)->withDefault();
    }
}
