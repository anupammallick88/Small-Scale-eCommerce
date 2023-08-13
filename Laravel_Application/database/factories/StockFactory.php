<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Stock;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'product_id' => function(){
    		return factory(Product::class)->create()->id;
        },
        'quantity' => 2,
    ];
});
