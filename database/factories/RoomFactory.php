<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
  $name = $faker->words(rand(1,5),true);
    return [
        'user_id'     =>    random_int(1,4),
        'name'        =>    $name,
        'slug'        =>    str_slug($name,'-'),
        'category'    =>    $faker->word(),
        'description' =>    $faker->text(300)
    ];
});
