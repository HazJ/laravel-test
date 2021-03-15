<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use Illuminate\Support\Str;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make('secret'), // More readable
        'remember_token'    => Str::random(20), // Fascades <3
    ];
});
