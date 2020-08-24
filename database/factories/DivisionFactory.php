<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Backend\Division;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Backend\Division::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'priority' => '1',
    ];
});
