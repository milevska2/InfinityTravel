<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_tickets', function (Blueprint $table) {
            $table->id();
            $table->enum('ticket_type', ['porvraten', 'eden pravec']);
            $table->date('departure_date');
            $table->date('return_date');
            $table->integer('adults');
            $table->integer('kids');
            $table->integer('babies');
            $table->enum('class', ['ekonomska', 'biznis']);
            $table->string('ime');
            $table->string('prezime');
            $table->string('email');
            $table->string('telefon');
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
        Schema::dropIfExists('plane_tickets');
    }
};
