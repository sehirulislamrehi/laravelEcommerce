<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function category(){
    	return $this->hasMany(Category::class);
    } 
}
