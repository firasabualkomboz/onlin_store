<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_categories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('translation_lang', 10);
            $table->unsignedInteger('translation_of');
            $table->string('name', 150);
            $table->string('slug', 150)->nullable();
            $table->string('photo', 150)->nullable();
            $table->boolean('active')->default(true)->comment('0=>unactive | 1=>active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('main_categories');
    }
}
