<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('orgName')->nullable();
            $table->string('orgUserName')->unique()->nullable();
            $table->string('adminEmail')->nullable();
            $table->string('payPalEmail')->nullable();
            $table->integer('eventSubmissions')->nullable();
            $table->integer('premiumSubmissions')->nullable();
            $table->string('accountType')->nullable();
            $table->string('category')->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
