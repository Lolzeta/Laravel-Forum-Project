<?php

use Faker\Generator as Faker;

$factory->define(App\Room::class, function (Faker $faker) {
  $name = $faker->words(rand(1,5),true);
    return [
        'name'        =>    $name,
        'slug'        =>    str_slug($name,'-'),
        'creator'     =>    $faker->userName(),
        'cathegory'   =>    $faker->word(),
        'description' =>    $faker->text(300),
        'votes'       =>    $faker->numberBetween(-10000,20000)
    ];
});
