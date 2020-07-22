<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Projects;
use Faker\Generator as Faker;

$factory->define(Projects::class, function (Faker $faker) {
    return [
        'title'         => $faker->text(50),
        'description'   => $faker->sentence(50),
        'user_id'       => rand(1, 2)
    ];
});
