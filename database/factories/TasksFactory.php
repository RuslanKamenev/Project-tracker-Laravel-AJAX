<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Tasks;
use Faker\Generator as Faker;

$factory->define(Tasks::class, function (Faker $faker) {

    return [
        'name'          => $faker->text(100),
        'status'        => rand(0,2),
        'description'   => $faker->sentence(50),
        'project_id'    => rand(1, 40),
        'deadline'      => $faker->date()
    ];
});


