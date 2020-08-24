<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Backend\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Category::class, function (Faker $faker) {
    
    return[
        'name' => 'Smart Phone',
        'slug' => 'smart-phone',
        'description' => 'This is smart phone category'
   	];
   	
});
