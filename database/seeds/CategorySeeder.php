<?php

use App\Models\MainCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('main_categories')->insert([
            'id'   => '22',
            'name' => 'قسم تجريبي جديد ',
            'translation_lang'=> 'ar',
            'translation_of'=> '20',

        ]);

    }
}
