<?php

namespace App\Http\Controllers;

use App\Models\Detenido;
use Illuminate\Http\Request;

class DetenidoController extends Controller
{
    /**
     * Lista de detenidos
     */
    public function index()
{
    /*
    |--------------------------------------------------------------------------
    | TABLA
    |--------------------------------------------------------------------------
    */

    $detenidos = Detenido::latest()->paginate(10);

    /*
    |--------------------------------------------------------------------------
    | TARJETAS
    |--------------------------------------------------------------------------
    */

    $total = Detenido::count();

    $hoy = Detenido::whereDate('fecha', now())->count();

    $mensual = Detenido::whereMonth('fecha', now()->month)
        ->whereYear('fecha', now()->year)
        ->count();

    $puestas = Detenido::whereNotNull('puesta_disposicion')->count();

    /*
    |--------------------------------------------------------------------------
    | DETENIDOS POR MES
    |--------------------------------------------------------------------------
    */

    $detenidosMes = Detenido::selectRaw('MONTH(fecha) mes, COUNT(*) total')
        ->whereYear('fecha', now()->year)
        ->groupBy('mes')
        ->orderBy('mes')
        ->get();

    $labelsMes = [];

    $dataMes = [];

    foreach ($detenidosMes as $mes){

        $labelsMes[] = date('M', mktime(0,0,0,$mes->mes,1));

        $dataMes[] = $mes->total;

    }

    return view('detenidos.index', compact(

        'detenidos',

        'total',

        'hoy',

        'mensual',

        'puestas',

        'labelsMes',

        'dataMes'

    ));
}

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('detenidos.crear');
    }

    /**
     * Guardar detenido
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_puesta' => 'required|unique:detenidos',
            'fecha' => 'required',
            'hora_puesta' => 'required',
            'primer_respondiente' => 'required',
            'lugar_detencion' => 'required',
            'detenido' => 'required',
        ]);

        Detenido::create($request->all());

        return redirect('/detenidos')
            ->with('success', 'Detenido registrado correctamente');
    }

    /**
     * Mostrar detenido
     */
    public function show($id)
    {
        $detenido = Detenido::findOrFail($id);

        return view('detenidos.detalle', compact('detenido'));
    }

    /**
     * Formulario de edición
     */
    public function edit($id)
    {
        $detenido = Detenido::findOrFail($id);

        return view('detenidos.editar', compact('detenido'));
    }

    /**
     * Actualizar detenido
     */
    public function update(Request $request, $id)
    {
        $detenido = Detenido::findOrFail($id);

        $request->validate([
            'numero_puesta' => 'required',
            'fecha' => 'required',
            'hora_puesta' => 'required',
            'primer_respondiente' => 'required',
            'lugar_detencion' => 'required',
            'detenido' => 'required',
        ]);

        $detenido->update($request->all());

        return redirect('/detenidos')
            ->with('success', 'Detenido actualizado correctamente');
    }

    /**
     * Eliminar detenido
     */
    public function destroy($id)
    {
        $detenido = Detenido::findOrFail($id);

        $detenido->delete();

        return redirect('/detenidos')
            ->with('success', 'Detenido eliminado correctamente');
    }
}