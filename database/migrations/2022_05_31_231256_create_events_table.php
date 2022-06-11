<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id_event');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_event_category');
            $table->unsignedBigInteger('id_event_address')->nullable();
            $table->string('title');
            $table->string('image');
            $table->integer('participants')->nullable();
            $table->integer('capacity');
            $table->text('description');
            $table->date('date');
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
        Schema::dropIfExists('events');
    }
}
