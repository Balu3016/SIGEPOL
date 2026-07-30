<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detenido extends Model
{
    protected $fillable = [
        'numero_puesta',
        'fecha',
        'folio_iph',
        'hora_puesta',
        'primer_respondiente',
        'lugar_detencion',
        'detenido',
        'rnd',
        'domicilio_detenido',
        'edad',
        'sexo',
        'vehiculo',
        'sancion',
    ];
}
