<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = "admins";
    
    protected $fillable = ['name','email','password','phone','role_id'];

    public function role(){
        return $this->belongsTo(Role::class)->withDefault();
    }

    public function profile(){
        return $this->hasOne(AdminProfile::class,'admin_id','id')->withDefault();
    }
}
