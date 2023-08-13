<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function products()
    {
        //check instance of user in cart if ! present then create

    	return $this->belongsToMany(Product::class)->withTimestamps()->withPivot('quantity');
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function clear()
    {
        $this->products()->detach();
    }
}
