<?php

use Faker\Generator as Faker;

$factory->define(App\Thread::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'category_id' => App\Category::pluck('id')->random(),
        'user_id' => App\User::pluck('id')->random(),
    ];
});
