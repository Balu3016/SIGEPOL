<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reporte;
use Illuminate\Support\Facades\DB;
use App\Models\Detenido;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {

            /*
            |--------------------------------------------------------------------------
            | TARJETAS PRINCIPALES (REPORTES)
            |--------------------------------------------------------------------------
            */
            $total = Reporte::count();
            $hoy = Reporte::whereDate('fecha', now())->count();
            $mensual = Reporte::whereMonth('fecha', now()->month)
                ->whereYear('fecha', now()->year)
                ->count();
            $serviciosPositivos = Reporte::where('positivo', 'POSITIVO')->count();
            $totalDetenidos = Detenido::count();

            /*
            |--------------------------------------------------------------------------
            | KPIs DETENIDOS
            |--------------------------------------------------------------------------
            */
            $detenidosHoy = Detenido::whereDate('fecha', now())->count();
            $detenidosMes = Detenido::whereMonth('fecha', now()->month)
                ->whereYear('fecha', now()->year)
                ->count();
            $puestasDisposicion = Detenido::whereNotNull('rnd')
                ->where('rnd', '!=', '')
                ->count();

            /*
            |--------------------------------------------------------------------------
            | GRÁFICAS DETENIDOS
            |--------------------------------------------------------------------------
            */
            $graficaSexo = Detenido::select('sexo', DB::raw('COUNT(*) as total'))
                ->whereNotNull('sexo')
                ->groupBy('sexo')
                ->get();

            $graficaLugarDetencion = Detenido::select('lugar_detencion', DB::raw('COUNT(*) as total'))
                ->whereNotNull('lugar_detencion')
                ->groupBy('lugar_detencion')
                ->orderByDesc('total')
                ->limit(10)
                ->get();

            $graficaRespondiente = Detenido::select('primer_respondiente', DB::raw('COUNT(*) as total'))
                ->whereNotNull('primer_respondiente')
                ->groupBy('primer_respondiente')
                ->orderByDesc('total')
                ->get();

            $graficaVehiculo = Detenido::select('vehiculo', DB::raw('COUNT(*) as total'))
                ->whereNotNull('vehiculo')
                ->where('vehiculo', '!=', '')
                ->groupBy('vehiculo')
                ->orderByDesc('total')
                ->get();

            $graficaSancion = Detenido::select('sancion', DB::raw('COUNT(*) as total'))
                ->whereNotNull('sancion')
                ->groupBy('sancion')
                ->orderByDesc('total')
                ->get();

            /*
            |--------------------------------------------------------------------------
            | RANGO DE EDADES
            |--------------------------------------------------------------------------
            */
            $rangosEdad = [
                '0-17'  => 0,
                '18-25' => 0,
                '26-35' => 0,
                '36-45' => 0,
                '46-60' => 0,
                '60+'   => 0,
            ];

            foreach (Detenido::whereNotNull('edad')->get() as $d) {
                if ($d->edad <= 17) $rangosEdad['0-17']++;
                elseif ($d->edad <= 25) $rangosEdad['18-25']++;
                elseif ($d->edad <= 35) $rangosEdad['26-35']++;
                elseif ($d->edad <= 45) $rangosEdad['36-45']++;
                elseif ($d->edad <= 60) $rangosEdad['46-60']++;
                else $rangosEdad['60+']++;
            }

            $labelsEdad = array_keys($rangosEdad);
            $dataEdad = array_values($rangosEdad);

            /*
            |--------------------------------------------------------------------------
            | DETENIDOS POR MES
            |--------------------------------------------------------------------------
            */
            $detenidosMesGrafica = Detenido::select(
                    DB::raw('MONTH(fecha) mes'),
                    DB::raw('COUNT(*) total')
                )
                ->whereYear('fecha', now()->year)
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();

            $labelsMesDetenidos = [];
            $dataMesDetenidos = [];

            foreach ($detenidosMesGrafica as $m) {
                $labelsMesDetenidos[] = date('M', mktime(0, 0, 0, $m->mes, 1));
                $dataMesDetenidos[] = $m->total;
            }

            $ultimosDetenidos = Detenido::latest()->take(5)->get();

            /*
            |--------------------------------------------------------------------------
            | REPORTES E INCIDENCIAS
            |--------------------------------------------------------------------------
            */
            $ultimos = Reporte::latest()->take(5)->get();
            $positivos = Reporte::where('positivo', 'POSITIVO')->count();
            $negativos = Reporte::where('positivo', 'NEGATIVO')->count();

            $estadisticas = Reporte::selectRaw('auxilio, COUNT(*) as total')
                ->groupBy('auxilio')
                ->orderByDesc('total')
                ->take(10)
                ->get();

            $sectores = Reporte::selectRaw('sector, COUNT(*) as total')
                ->groupBy('sector')
                ->orderByDesc('total')
                ->get();

            $labelsSectores = $sectores->pluck('sector');
            $dataSectores = $sectores->pluck('total');

            $mediosReporte = Reporte::select('medio_reporte', DB::raw('COUNT(*) as total'))
                ->groupBy('medio_reporte')
                ->orderByDesc('total')
                ->get();

            $rankingSectores = Reporte::select('sector', DB::raw('COUNT(*) as total'))
                ->whereNotNull('sector')
                ->where('sector', '!=', '')
                ->groupBy('sector')
                ->orderByDesc('total')
                ->get();

            $labelsRankingSectores = $rankingSectores->pluck('sector');
            $dataRankingSectores = $rankingSectores->pluck('total');

            $horarios = Reporte::select(
                    DB::raw('HOUR(hora_reporte) as hora'),
                    DB::raw('COUNT(*) as total')
                )
                ->groupBy(DB::raw('HOUR(hora_reporte)'))
                ->orderBy('hora')
                ->get();

            $labelsHoras = $horarios->pluck('hora');
            $dataHoras = $horarios->pluck('total');

            $reportesMapa = Reporte::whereNotNull('coordenadas')
                ->where('coordenadas', '!=', '')
                ->get();

            return view('admin.dashboard', compact(
                // REPORTES
                'total',
                'hoy',
                'mensual',
                'serviciosPositivos',
                'totalDetenidos',
                'ultimos',
                'positivos',
                'negativos',
                'estadisticas',
                'labelsSectores',
                'dataSectores',
                'mediosReporte',
                'labelsRankingSectores',
                'dataRankingSectores',
                'labelsHoras',
                'dataHoras',
                'reportesMapa',

                // DETENIDOS
                'detenidosHoy',
                'detenidosMes',
                'puestasDisposicion',
                'graficaSexo',
                'graficaLugarDetencion',
                'graficaRespondiente',
                'graficaVehiculo',
                'graficaSancion',
                'labelsEdad',
                'dataEdad',
                'labelsMesDetenidos',
                'dataMesDetenidos',
                'ultimosDetenidos'
            ));
        }

        if ($user->role === 'comandante') {
            return view('comandante.dashboard');
        }

        return view('elemento.dashboard');
    }
}