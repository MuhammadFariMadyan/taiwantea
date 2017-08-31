<?php
 use Illuminate\Support\Facades\DB;

  function getItem($item_id){
    $item = DB::table('items')->where('id', $item_id)->first();
    return $item->name;
  }

  function getTop($category){
  	$topCat = \App\Models\TopCat::where('slug', $category)->first();
  	$topping = \App\Models\Topping::where('topcat_id', $topCat->id)->get();
  	return $topping;
  }
