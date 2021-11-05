<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_role', function (Blueprint $table) {
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
        Schema::dropIfExists('company_role');
    }
}
