<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	// protected $table = ['order_details'];
    protected $fillable = ['order_id', 'item_id'];

    public function items(){
      return $this->hasMany('App\Models\Item');
    }

    public function orderDetail(){
      return $this->belongsTo('App\Models\Order');
    }
}
