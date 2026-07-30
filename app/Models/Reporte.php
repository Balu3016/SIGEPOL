<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reporte;

class Reporte extends Model
{
            protected $fillable = [
    'folio',
    'fecha',
    'auxilio',
    'crp',
    'medio_reporte',
    'hora_reporte',
    'hora_termino',
    'sector',
    'calle',
    'coordenadas',
    'responsable',
    'escolta',
    'victima',
    'victimario',
    'positivo',
    'resolucion'
];


}
