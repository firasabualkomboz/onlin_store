<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'photoone' => $faker->image,
        'price' =>(20),
        'main_category_id'=>('7'),
        'created_at' => now(),
    ];
});
