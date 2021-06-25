<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $main_category_id = 7;
    $url_image = 'https://fakeimg.pl/300/';
    return [

        'name'               => $this->faker->colorName,
        'price'              => $this->faker->price,
        'main_category_id'   =>$main_category_id,
        // 'photoone'           =>$this->faker->imageUrl(),
        'photoone'           =>null,

    ];
});
