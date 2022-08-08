<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 150);
            $table->string('logo', 200);
            $table->string('mobile', 100);
            $table->text('address');
            $table->string('email', 150)->nullable();
            $table->integer('category_id');
            $table->timestamps();
            $table->boolean('active')->default(false);
            $table->string('password', 100);
            $table->string('latitude', 225)->nullable();
            $table->string('longitude', 225)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendors');
    }
}
