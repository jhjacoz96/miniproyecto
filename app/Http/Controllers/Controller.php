<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Barryvdh\DomPDF\Facade as PDF;
use App\Empleado;
use App\Departamento;
use Carbon\Carbon;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function imprimir(){
        $now =Carbon::now();
        $empleado=Empleado::where('estatus','A')->orderBy('created_at','asc')->get();
        $pdf= \PDF::loadView('Reporte/reporteEmpleado',compact('empleado'),compact('now'));
        return $pdf->download('reporteEmpleado.pdf');
    }
}
