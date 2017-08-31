<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Topping extends Model
{
    protected $fillable = ['topcat_id', 'slug', 'name', 'image', 'price'];

    public function category(){
      return $this->belongsTo('App\Models\TopCat', 'topcat_id', 'id');
    }

    public function getTopping($slug){
    	switch ($slug) {
    		case 'rocksalt-n-cheese':
    			return $topping = [
    				'ice' => getTop('ice'),
    				'sugar' => getTop('sugar'),
    				'topping1' => getTop('drink'),
    				'topping2' => [],
    				'topping3' => [],
    				'topping4' => [],
    				'icecream' => [],
    				'food1' => [],
    				'food2' => [],
    			];
    			break;

            case 'taiwans-snack':
                return $topping = [
                    'ice' => [],
                    'sugar' => [],
                    'topping1' => [],
                    'topping2' => [],
                    'topping3' => [],
                    'topping4' => [],
                    'icecream' => [],
                    'food1' => getTop('food'),
                    'food2' => getTop('food'),
                ];
                break;

            case 'taiwans-dessert':
                return $topping = [
                    'ice' => [],
                    'sugar' => [],
                    'topping1' => getTop('drink'),
                    'topping2' => getTop('drink'),
                    'topping3' => getTop('drink'),
                    'topping4' => getTop('drink'),
                    'icecream' => getTop('ice-cream'),
                    'food1' => [],
                    'food2' => [],
                ];
                break;

    		
    		default:
    			return $topping = [
    				'ice' => getTop('ice'),
                    'sugar' => getTop('sugar'),
                    'topping1' => getTop('drink'),
    				'topping2' => getTop('drink'),
    				'topping3' => [],
    				'topping4' => [],
    				'icecream' => [],
    				'food1' => [],
    				'food2' => [],
    			];
    			break;
    	}
    }
}
