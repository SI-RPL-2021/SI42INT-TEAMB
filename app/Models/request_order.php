<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class request_order extends Model
{
    use HasFactory;
    protected $table = 'request_order';

    public function product(){
        return $this->belongsTo(Products::class , 'product_id' , 'id');
    }
    public function total(){
        return $this->hasOne(total::class , 'id_request' , 'id');
    }
}
