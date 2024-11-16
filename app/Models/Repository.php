<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    public $timestamps = false;
    protected $fillable=['branch_id','product_id','quantity'];
}
