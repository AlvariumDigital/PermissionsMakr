<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_roles', function (Blueprint $table) {
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('role_id');
            $table->primary(['profile_id', 'role_id']);
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_roles');
    }
}
