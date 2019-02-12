<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id'       => random_int(1,4),
        'room_id'       => random_int(1,20),
        'message'       => $faker->text(300)
    ];
});
