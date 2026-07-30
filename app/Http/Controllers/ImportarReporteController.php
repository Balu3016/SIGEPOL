<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ReportesImport;

class ImportarReporteController extends Controller
{
    public function index()
    {
        return view('reportes.importar');
    }

    public function importar(Request $request)
    {
        $request->validate([
            'archivo' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ReportesImport, $request->file('archivo'));

        return back()->with('success', 'Excel importado correctamente');
    }
}