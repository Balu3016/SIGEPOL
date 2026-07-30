<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comunidad;

class ComunidadSeeder extends Seeder
{
    public function run(): void
    {
        $comunidades = [

            ['nombre' => 'Ocoyoacac', 'tipo' => 'Cabecera'],
            ['nombre' => 'San Pedro Cholula', 'tipo' => 'Pueblo'],
            ['nombre' => 'San Juan Coapanoaya', 'tipo' => 'Pueblo'],
            ['nombre' => 'Santa María Tepexoyuca', 'tipo' => 'Pueblo'],
            ['nombre' => 'San Jerónimo Acazulco', 'tipo' => 'Pueblo'],
            ['nombre' => 'San Pedro Atlapulco', 'tipo' => 'Pueblo'],

            ['nombre' => 'Santiaguito', 'tipo' => 'Barrio'],
            ['nombre' => 'Santa María', 'tipo' => 'Barrio'],
            ['nombre' => 'San Miguel', 'tipo' => 'Barrio'],

            ['nombre' => 'La Marquesa', 'tipo' => 'Colonia'],
            ['nombre' => 'Río Hondito', 'tipo' => 'Colonia'],
            ['nombre' => 'Juárez Los Chirinos', 'tipo' => 'Colonia'],
            ['nombre' => 'Ortiz Rubio', 'tipo' => 'Colonia'],
            ['nombre' => 'Guadalupe Hidalgo', 'tipo' => 'Colonia'],
            ['nombre' => 'Guadalupe Victoria', 'tipo' => 'Colonia'],
            ['nombre' => 'La Piedra', 'tipo' => 'Colonia'],
            ['nombre' => 'Loma Bonita', 'tipo' => 'Colonia'],
            ['nombre' => 'Loma de los Esquiveles', 'tipo' => 'Colonia'],
            ['nombre' => 'El Llano del Compromiso', 'tipo' => 'Colonia'],
            ['nombre' => 'El Bellotal', 'tipo' => 'Colonia'],
            ['nombre' => 'Santa Teresa', 'tipo' => 'Colonia'],
            ['nombre' => 'El Pirame', 'tipo' => 'Colonia'],
            ['nombre' => 'La Mora', 'tipo' => 'Colonia'],
            ['nombre' => 'Pila Vieja', 'tipo' => 'Colonia'],
            ['nombre' => 'San Antonio El Llanito', 'tipo' => 'Colonia'],
            ['nombre' => 'Cañada Honda', 'tipo' => 'Colonia'],
            ['nombre' => 'El Portezuelo', 'tipo' => 'Colonia'],
            ['nombre' => 'El Peñón', 'tipo' => 'Colonia'],
            ['nombre' => 'San Felipe', 'tipo' => 'Colonia'],
            ['nombre' => 'Valle del Silencio', 'tipo' => 'Colonia'],
            ['nombre' => 'La Cima', 'tipo' => 'Colonia'],
            ['nombre' => 'El Zarco', 'tipo' => 'Colonia'],
            ['nombre' => 'Ex Hacienda Texcalpa', 'tipo' => 'Colonia'],
            ['nombre' => 'Presa de Salazar', 'tipo' => 'Colonia'],
            ['nombre' => 'El Pedregal', 'tipo' => 'Colonia'],
            ['nombre' => 'Centro Ocoyoacac', 'tipo' => 'Colonia'],
            ['nombre' => 'Hacienda San Martín', 'tipo' => 'Colonia'],

        ];

        foreach ($comunidades as $comunidad) {

            Comunidad::firstOrCreate([
                'nombre' => $comunidad['nombre']
            ], $comunidad);

        }
    }
}