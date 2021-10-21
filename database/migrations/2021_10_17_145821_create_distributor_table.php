<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributor', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('id_card_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('id_card_photo_uri')->nullable();
            $table->string('area');
            $table->string('address')->nullable();
            $table->boolean('is_verified');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('user');
            $table->primary('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distributor');
    }
}
