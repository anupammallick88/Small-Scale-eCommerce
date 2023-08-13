<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cart;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'user_id' => function(){
    		return factory(User::class)->create()->id;
        },
        'product_id' => function(){
    		return factory(Product::class)->create()->id;
        },
        'quantity' => $faker->randomDigit,
    ];
});
