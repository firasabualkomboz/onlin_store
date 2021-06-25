<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        // $this->call(ProductTableSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // Product::factory(10)->create();
        factory(Product::class,10)->make();

    }
}
