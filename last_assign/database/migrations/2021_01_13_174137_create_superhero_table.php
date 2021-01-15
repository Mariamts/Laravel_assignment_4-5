<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuperheroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('superhero', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('manufactor_id')->nullable();
            $table->foreign('manufactor_id')->references('id')->on('manufactor');
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
        Schema::dropIfExists('superhero');
    }
}
