<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_id' => $faker->numberbetween($min=1 , $max=5),
        'description' => $faker->text, 
    ];
});
