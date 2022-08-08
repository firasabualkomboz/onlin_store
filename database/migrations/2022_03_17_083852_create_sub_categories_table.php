<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('category_id');
            $table->integer('parent_id')->default(0);
            $table->string('name', 225);
            $table->string('slug', 225)->nullable();
            $table->string('photo', 225)->nullable();
            $table->string('translation_lang', 225);
            $table->integer('translation_of');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('sub_categories');
    }
}
