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
            DB::table('products')->insert([
                'name'                      => $faker->city,
                'photoone'                  => $faker-> image('public/storage/images',640,480, null, false,),
                'price'                     => $faker->numberBetween($min = 500, $max = 8000),
                'main_category_id'          =>function () {
                    return factory(App\Models\MainCategory::class)->create()->id;
                } ,

            ]);
            }

    }
}
