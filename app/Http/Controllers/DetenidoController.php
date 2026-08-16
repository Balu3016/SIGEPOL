<?php

namespace App\Http\Controllers;

use App\Models\Detenido;
use Illuminate\Http\Request;

class DetenidoController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTA DE DETENIDOS
    |--------------------------------------------------------------------------
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

        // Total de detenidos
        $total = Detenido::count();


        // Detenidos registrados hoy
        $hoy = Detenido::whereDate('fecha', now())
            ->count();


        // Detenidos registrados durante el mes actual
        $mensual = Detenido::whereMonth('fecha', now()->month)
            ->whereYear('fecha', now()->year)
            ->count();


        // Detenidos con RND
        $puestas = Detenido::whereNotNull('rnd')
            ->where('rnd', '!=', '')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | DETENIDOS POR MES
        |--------------------------------------------------------------------------
        */

        $detenidosMes = Detenido::selectRaw(
            'MONTH(fecha) as mes, COUNT(*) as total'
        )
            ->whereYear('fecha', now()->year)
            ->groupByRaw('MONTH(fecha)')
            ->orderByRaw('MONTH(fecha)')
            ->get();


        $labelsMes = [];

        $dataMes = [];


        foreach ($detenidosMes as $mes) {

            $labelsMes[] = date(
                'M',
                mktime(0, 0, 0, $mes->mes, 1)
            );

            $dataMes[] = $mes->total;
        }


        /*
        |--------------------------------------------------------------------------
        | RETORNAR VISTA
        |--------------------------------------------------------------------------
        */

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


    /*
    |--------------------------------------------------------------------------
    | FORMULARIO DE CREACIÓN
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('detenidos.crear');
    }


    /*
    |--------------------------------------------------------------------------
    | GUARDAR DETENIDO
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'numero_puesta' => 'required|unique:detenidos,numero_puesta',

            'fecha' => 'required|date',

            'hora_puesta' => 'required',

            'primer_respondiente' => 'required',

            'lugar_detencion' => 'required',

            'detenido' => 'required',

        ]);


        Detenido::create($request->all());


        return redirect()
            ->route('detenidos.index')
            ->with('success', 'Detenido registrado correctamente');
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR DETENIDO
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $detenido = Detenido::findOrFail($id);


        return view(
            'detenidos.detalle',
            compact('detenido')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | FORMULARIO DE EDICIÓN
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $detenido = Detenido::findOrFail($id);


        return view(
            'detenidos.editar',
            compact('detenido')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ACTUALIZAR DETENIDO
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $detenido = Detenido::findOrFail($id);


        $request->validate([

            'numero_puesta' => 'required',

            'fecha' => 'required|date',

            'hora_puesta' => 'required',

            'primer_respondiente' => 'required',

            'lugar_detencion' => 'required',

            'detenido' => 'required',

        ]);


        $detenido->update(
            $request->all()
        );


        return redirect()
            ->route('detenidos.index')
            ->with('success', 'Detenido actualizado correctamente');
    }


    /*
    |--------------------------------------------------------------------------
    | ELIMINAR DETENIDO
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $detenido = Detenido::findOrFail($id);


        $detenido->delete();


        return redirect()
            ->route('detenidos.index')
            ->with('success', 'Detenido eliminado correctamente');
    }
}