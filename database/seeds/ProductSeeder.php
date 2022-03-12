<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_category_id = 7;
        // $photo = "";
        $faker = Faker::create();

        foreach (range(1, 10) as $index)  {
            DB::table('product')->insert([
                'name'               => $faker->colorName,
                'price'              => $faker->randomDigit,
                'main_category_id'   => $main_category_id,
                'photoone' => $faker->imageUrl($width = 550, $height = 750),
            ]);
            }

    }
}
