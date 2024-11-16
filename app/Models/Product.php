<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $fillable=['name','type'];
    public function branches(){
        return $this->belongsToMany(Branch::class,'repository');
    }
}
