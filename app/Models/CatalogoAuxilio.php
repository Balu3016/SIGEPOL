<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoAuxilio extends Model
{
    use HasFactory;

    protected $table = 'catalogo_auxilios';

    protected $fillable = [
        'nombre'
    ];
}