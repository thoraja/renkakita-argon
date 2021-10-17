<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_company', function (Blueprint $table) {
            $table->unsignedTinyInteger('role_id');
            $table->unsignedTinyInteger('company_id');

            $table->foreign('role_id')->references('id')->on('user_role');
            $table->foreign('company_id')->references('id')->on('company');
            $table->primary(['role_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_company');
    }
}
