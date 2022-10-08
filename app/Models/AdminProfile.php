<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    public $incementing = false;
    protected $primaryKey ="admin_id";

    protected $guarded =[];

    public function admin(){
        return $this->belongsTo(Admin::class , 'admin_id','id')->withDefault();
    }

}
