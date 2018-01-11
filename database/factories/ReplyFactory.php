<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'body' => substr( $faker->sentence( rand(1,50) ), 0,500),
        'thread_id' => App\Thread::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
    ];
});
