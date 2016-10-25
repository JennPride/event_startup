<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditingPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('eventLevel');
            $table->string('pageColor');
            $table->text('longDescription');
            $table->text('orgDescription');
            $table->string('orgLink');
            $table->string('twitterLink');
            $table->string('facebookLink');
            $table->string('instagramLink');
            $table->binary('eventLargeImage');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            //
        });
    }
}
