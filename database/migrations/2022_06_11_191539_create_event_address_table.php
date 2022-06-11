<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_address', function (Blueprint $table) {
            $table->bigIncrements('id_event_address');
            $table->string('event_cep');
            $table->string('event_city');
            $table->string('event_state');
            $table->string('event_address');
            $table->string('event_address_district');
            $table->integer('event_address_number');

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
        Schema::dropIfExists('event_address');
    }
}
