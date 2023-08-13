<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use App\Categories;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => function(){
    		return factory(Categories::class)->create()->id;
    	},
    	'title' => $faker->word,
    	'description' => $faker->paragraph,
    	'cost' => $faker->randomDigit,
    ];
});
