<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('studentid');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('username');
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('guardianname')->nullable();
            $table->string('phone');
            $table->string('class');
            $table->string('classbranch');
            $table->string('active')->nullable();
            $table->string('status')->nullable();
            $table->string('resetpass')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('parentemail')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
