<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'door'     => $faker->randomNumber(),
        'street'   => $faker->streetAddress,
        'city'     => $faker->city,
        'postcode' => $faker->postcode,
    ];
});
