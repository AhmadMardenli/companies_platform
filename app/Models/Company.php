<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $timestamps = false;
    protected $fillable=['name','establishment_date','location','activity'];
    public function branches(){
        return $this->hasMany(Branch::class,'company_id','id');
    }
}
