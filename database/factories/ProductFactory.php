<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Backend\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Models\Backend\Product::class, function (Faker $faker) {
    return [
    	'brand_id'			=> '1',
    	'category_id'		=> '1',
        'title' 			=> $faker->sentence(2),
        'slug'				=> $faker->sentence(2),
        'description'		=> 'Product Table',
        'regular_price'		=> '500',
        'offer_price'		=> '500',
        'quantity'			=> '10',
        'is_featured'		=> '1',
        'status' 			=> '1',
    ];
});
