<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoAuxiliosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $auxilios = [

            'Robo a comercio',
            'Robo a casa habitación',
            'Robo de vehículo / motocicleta',
            'Robo a transeúnte',
            'Robo con violencia',
            'Robo de autopartes',
            'Robo de ganado',
            'Daño a los bienes',
            'Extorsión',
            'Tala ilegal',
            'Abuso de confianza',
            'Activacion de Alarma',
            'Violencia de género',
            'Violencia familiar',
            'Violencia de pareja',
            'Violencia contra menores',
            'Acoso / Hostigamiento',
            'Agresión física',
            'Privación de la libertad',
            'Persona extraviada',
            'Amenazas',
            'Hallazgo de restos humanos',
            'Riña / Alteración al orden',
            'Allanamiento de morada',
            'Actos impúdicos',
            'Estado inconveniente',
            'Consumo de sustancias prohibidas',
            'Personas sospechosas',
            'Vehículos sospechosos',
            'Detonaciones por arma de fuego',
            'Portación de arma',
            'Obstrucción de vía pública',
            'Dron sobrevolando',
            'Arrojo de residuos',
            'Almacenamiento ilícito',
            'Exceso de ruido',
            'Persona inconsciente',
            'Lesionado por arma',
            'Intento de suicidio',
            'Femenina sin signos vitales',
            'Persona atropellada',
            'Menor al interior de vehículo',
            'Falla en infraestructura',
            'Percance vehicular',
            'Derrape de motocicleta',
            'Volcadura',
            'Incendio',
            'Fuga de gas',
            'Vehículo abandonado',
            'Puesta a disposición J.C.',
            'Puesta a disposición administrativa'

        ];

        foreach ($auxilios as $auxilio) {

            DB::table('catalogo_auxilios')->insert([
                'nombre' => $auxilio,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        }

    }
}
