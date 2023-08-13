<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function users()
    {
    	return $this->belongsToMany(User::class)->withPivot('total');
    }

    public function Category()
    {
    	return $this->belongsTo(Categories::class, 'category_id');
    }

    public function stock()
    {
    	return $this->hasOne(Stock::class);
    }

    public function carts()
    {
    	return $this->belongsToMany(Cart::class)->withTimestamps();
    }


}
