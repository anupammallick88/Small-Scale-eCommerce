<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use App\User;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'user_id' => function(){
    		return factory(User::class)->create()->id;
        },
        'street' => $faker->sentence,
        'city' => $faker->city,
        'pincode' => $faker->randomDigit,
        'state' => $faker->word,
        'phone_number' => $faker->randomDigit,
    ];
});
