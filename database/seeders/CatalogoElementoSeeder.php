<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoElementoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elementos = [


            
           ['nombre' => ' TORRES AGUILAR JOAQUIN'],
           ['nombre' => 'AVILEZ MENDIOLA JOHANN JAFET'],
           ['nombre' => ' DURAN TORRES EDGAR JESÚS'],
           ['nombre' => ' ESCAMILLA LINARES ADRIAN'],
           ['nombre' => 'FLORES DIAZ EDGAR ISMAEL '],
           ['nombre' => ' GARCIA GARCIA MARCO ANTONIO'],
           ['nombre' => ' GARCIA LOPEZ CESAR '],
           ['nombre' => ' GARCÍA RODRÍGUEZ PABLO'],
           ['nombre' => 'GOMEZ CABRERA SUSANA'],
           ['nombre' => 'GONZÁLEZ BASTIDA TERESA'],
           ['nombre' => 'HERNANDEZ ANDRES TORIBIO'],
           ['nombre' => ' LIMÓN BAUTISTA ADRIAN'],
           ['nombre' => ' LÓPEZ GÓMEZ KARINA IVETTE'],
           ['nombre' => ' MARTIN CAYETANO LUIS GUSTAVO'],
           ['nombre' => ' MARTINEZ MENDOZA JORGE'],
           ['nombre' => ' MARTINEZ PEREZ MARIELA'],
           ['nombre' => ' MEDINA MORALES JAVIER'],
           ['nombre' => ' MONROY MONTES DE OCA FERNANDO'],
           ['nombre' => ' SÁNCHEZ ORO JOSE '],
           ['nombre' => ' SANCHEZ TORRES YESICA JHOSELIN'],
           ['nombre' => ' SANTIZ GÓMEZ GABRIEL '],
           ['nombre' => ' SEGURA SÁNCHEZ VICTOR'],
           ['nombre' => ' TOLEDO CASTELLANOS GUILLERMINA '],
           ['nombre' => ' MALPICA SOLORIO YUSSI DHARINKA'],
           ['nombre' => 'PEREZ PEREZ BETSBE ITZEL'],
           ['nombre' => 'GARCIA FIGUEROA GUSTAVO'],




        ];

        DB::table('catalogo_elementos')->insert($elementos);
    }
}
