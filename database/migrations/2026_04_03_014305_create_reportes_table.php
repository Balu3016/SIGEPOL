<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('reportes', function (Blueprint $table) {
        $table->id();
        $table->date('fecha');
        $table->string('folio')->unique();

        $table->string('auxilio');
        $table->string('crp')->nullable();
        $table->string('medio_reporte');

        $table->time('hora_reporte');
        $table->time('hora_termino');

        $table->string('sector');
        $table->string('calle');
        $table->string('coordenadas');

        $table->string('responsable');
        $table->string('escolta')->nullable();

        $table->string('victima')->nullable();
        $table->string('victimario')->nullable();

        $table->string('positivo');
        $table->text('resolucion');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
