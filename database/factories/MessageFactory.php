<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'user_id'       => random_int(1,2),
        'room_id'       => random_int(1,4),
        'message'       => $faker->text(300)
    ];
});
