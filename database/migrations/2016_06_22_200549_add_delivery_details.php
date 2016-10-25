<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliveryDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchandise', function (Blueprint $table) {
            $table->text('delivery_details');
        });

        Schema::create('ticket', function (Blueprint $table) {
            $table->text('delivery_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandise', function (Blueprint $table) {
            //
        });
    }
}
