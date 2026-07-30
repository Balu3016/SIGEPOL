<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reporte;
use App\Models\CatalogoAuxilio;
use App\Models\CatalogoElemento;
use App\Models\Comunidad;


class ReporteController extends Controller
{

    // 🔥 LISTA DE REPORTES
   public function index(Request $request)
{
    $query = Reporte::query();

    // FILTRO AUXILIO
    if ($request->auxilio) {

        $query->where('auxilio', $request->auxilio);

    }

    $reportes = $query->latest()->paginate(10)->withQueryString();

    $auxilios = CatalogoAuxilio::all();

    return view('reportes.index', compact(
        'reportes',
        'auxilios'
    ));
}


    // 🔥 FORMULARIO CREAR
    public function create()
{
    $auxilios = CatalogoAuxilio::all();

    $elementos = CatalogoElemento::all();
    $comunidades = Comunidad::orderBy('nombre')->get();




    return view('reportes.crear-reporte', compact(
        'auxilios',
        'elementos',
        'comunidades'
    ));
}


    // 🔥 GUARDAR REPORTE
    public function store(Request $request)
    {

        $ultimo = Reporte::latest()->first();

        $numero = $ultimo ? $ultimo->id + 1 : 1;

        $folio = 'T-I-' . str_pad($numero, 4, '0', STR_PAD_LEFT);

        Reporte::create([

            // FOLIO
            'folio' => $folio,

            // FECHA
            'fecha' => now(),

            // DATOS
            'auxilio' => $request->auxilio,
            'crp' => $request->crp,
            'medio_reporte' => $request->medio_reporte,

            // HORAS
            'hora_reporte' => $request->hora_reporte,
            'hora_termino' => $request->hora_termino,

            // UBICACIÓN
            'sector' => $request->sector,
            'calle' => $request->calle,
            'coordenadas' => $request->coordenadas,

            // PERSONAL
            'responsable' => $request->responsable,
            'escolta' => $request->escolta,

            // PERSONAS
            'victima' => $request->victima,
            'victimario' => $request->victimario,

            // RESULTADO
            'positivo' => $request->positivo,
            'resolucion' => $request->resolucion,

        ]);

        return back()->with('success', 'Reporte guardado');
    }


    // 🔥 VER DETALLE
    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);

        return view('reportes.detalle', compact('reporte'));
    }


    // 🔥 EDITAR
    public function edit($id)
{
    $reporte = Reporte::findOrFail($id);
    $auxilios = CatalogoAuxilio::orderBy('nombre')->get();
    $comunidades = Comunidad::orderBy('nombre')->get();
    $elementos = CatalogoElemento::orderBy('nombre')->get();

    return view('reportes.editar', compact(
        'reporte',
        'auxilios',
        'comunidades',
        'elementos'
    ));
}

 





    // 🔥 ACTUALIZAR
    public function update(Request $request, $id)
    {

        $reporte = Reporte::findOrFail($id);

        $reporte->update([

            'auxilio' => $request->auxilio,
            'crp' => $request->crp,
            'medio_reporte' => $request->medio_reporte,

            'hora_reporte' => $request->hora_reporte,
            'hora_termino' => $request->hora_termino,

            'sector' => $request->sector,
            'calle' => $request->calle,
            'coordenadas' => $request->coordenadas,

            'responsable' => $request->responsable,
            'escolta' => $request->escolta,

            'victima' => $request->victima,
            'victimario' => $request->victimario,

            'positivo' => $request->positivo,
            'resolucion' => $request->resolucion,

        ]);

        return redirect('/reportes')
            ->with('success', 'Reporte actualizado');
    }

        public function destroy($id)
{
    $reporte = Reporte::findOrFail($id);

    $reporte->delete();

    return redirect('/reportes')
        ->with('success', 'Reporte eliminado correctamente');
}

}