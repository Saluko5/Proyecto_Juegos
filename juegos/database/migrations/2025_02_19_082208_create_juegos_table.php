<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('juegos', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->id();
            $table->string('nombre');
            $table->integer('anho');
            $table->bigInteger("plataforma_id")->unsigned(); //Creando el tipo integer para relacionar la tabla juegos con la tabla consolas
            $table->integer('nota');
            $table->timestamps();
            //Con esto lo vinculo como foraneo y pongo que al borrar se borre en cascada
            $table->foreign('plataforma_id')->references('id')->on('consolas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juegos');
    }
};
