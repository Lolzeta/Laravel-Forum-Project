<?php

use Faker\Generator as Faker;

$factory->define(App\Community::class, function (Faker $faker) {
    $name = $faker->words(rand(1,5),true);
    return [
        'user_id'     =>    random_int(1,4),
        'name'        =>    $name,
        'slug'        =>    str_slug($name,'-'),
        'description' =>    $faker->text(300)
    ];
});
