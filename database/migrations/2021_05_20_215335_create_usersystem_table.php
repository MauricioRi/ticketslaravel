<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersystemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usersystem', function (Blueprint $table) {
            $table->increments('idusersystem');
            $table-> char('Name_user', 100);
            $table-> char('Ap_mat', 100);
            $table-> char('Ap_pat', 100);
            $table->string('email');
            $table->string('password');
            $table->integer('phone');
            $table->string('salt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usersystem');
    }
}
