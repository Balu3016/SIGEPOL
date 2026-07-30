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
    Schema::create('detenidos', function (Blueprint $table) {

        $table->id();

        // Datos de la puesta
        $table->string('numero_puesta')->unique();

        $table->date('fecha');

        $table->string('folio_iph')->nullable();

        $table->time('hora_puesta');

        // Primer respondiente
        $table->string('primer_respondiente');

        // Lugar de detención
        $table->string('lugar_detencion');

        // Datos del detenido
        $table->string('detenido');

        $table->string('rnd')->nullable();

        $table->string('domicilio_detenido')->nullable();

        $table->integer('edad')->nullable();

        $table->enum('sexo', [
            'MASCULINO',
            'FEMENINO'
        ])->nullable();

        // Vehículo relacionado
        $table->string('vehiculo')->nullable();

        // Sanción o motivo de puesta
        $table->text('sancion')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detenidos');
    }
};
