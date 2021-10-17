<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name');
            $table->unsignedTinyInteger('company_id');
            $table->unsignedSmallInteger('material_id');
            $table->unsignedTinyInteger('category_id');
            $table->smallInteger('stock');
            $table->integer('price');
            $table->timestamps();

            $table->foreign('material_id')->references('id')->on('product_material');
            $table->foreign('category_id')->references('id')->on('product_category');
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
