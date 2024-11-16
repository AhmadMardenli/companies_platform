<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public $timestamps = false;
    protected $fillable=['type','name','location','major_branch_id','company_id'];
    public function secondaryBranches(){
        return $this->hasMany(Branch::class,'id','major_branch_id');
    }
    public function products(){
        return $this->hasMany(Product::class,'branch_id','id');
    }
    public function productions(){
        return $this->hasMany(Production::class,'branch_id','id');
    }
    public function distirbutions(){
        return $this->hasMany(Distribution::class,'source_branch_id','id');
    }
    public function repository(){
        return $this->belongsToMany(Product::class,'repository');
    }

}
