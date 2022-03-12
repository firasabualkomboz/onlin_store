<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $main_category_id = 7;
    $url_image = 'https://fakeimg.pl/300/';
    return [

        'name'               => $faker->colorName,
        'price'              => $faker->randomDigit,
        'main_category_id'   => $main_category_id,
        'photoone' => $faker->image('assets/images/maincategories',640,480, null, false),

    ];
});
