<?php

use Faker\Generator as Faker;

$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        'user_id'   =>  random_int(1,2),
        'valoration' => random_int(-1,1)
    ];
});
