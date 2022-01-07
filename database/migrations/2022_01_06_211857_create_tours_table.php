<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('destino');
            $table->string('descripcion');
            $table->string('costo_1');
            $table->string('costo_2');
            $table->string('costo_3');
            $table->string('costo_4');
            $table->string('dificultad');
            $table->string('incluye');
            $table->string('img_1');
            $table->string('img_2');
            $table->string('estado');

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
        Schema::dropIfExists('tours');
    }
}
