<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobile extends Model
{
    use HasFactory;
    public function customer(){
        return $this->belongsTo(Mobile::class,'customer_id','id');
    }
}
