<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['invoice', 'name', 'phone', 'address', 'total_price', 'status'];

    public function orderDetails(){
      return $this->hasMany('App\Models\OrderDetail');
    }

    public function getStatus($status){
        if ($status == 'or') {
            return "Order";
        } else if ($status == 'cm') {
            return "Order Confirmed";
        } else if ($status == 'cl') {
            return "Order Canceled";
        } else {
            return "Order Delivered";
        }
    }
}
