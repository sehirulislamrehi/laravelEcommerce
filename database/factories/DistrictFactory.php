<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Backend\District;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Backend\District::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
        'division_id' => '1'

    ];
});
