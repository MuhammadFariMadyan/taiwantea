<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['title', 'slug'];

    public function items(){
    	return $this->hasMany('App\Models\Item');
    }
}
