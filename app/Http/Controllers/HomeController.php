<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desglose = "select sum(ingreso_dep_central) ingreso_central,
        sum(ingreso_dep_cliente) ingreso_cliente,
        upper(monthname(fecha_deposito)) as fecha_deposito
        from depositos
        where month(fecha_deposito) = month(current_date() - interval 1 month)
        and year(fecha_deposito) = year(current_date())
        group by upper(monthname(fecha_deposito))

     union all

select  sum(ingreso_dep_central) ingreso_central,
        sum(ingreso_dep_cliente) ingreso_cliente,
        #(sum(ingreso_dep_central) + sum(ingreso_dep_cliente)) total_dia,
        upper(monthname(fecha_deposito)) as fecha_deposito
        from depositos
        where month(fecha_deposito) = month(current_date())
        and year(fecha_deposito) = year(current_date()) group by upper(monthname(fecha_deposito))";
        $result1 = DB::SELECT($desglose);
        // dd($result1);

        return view('home')->with('desgloses', $result1);
    }

    public function export()
    {
        //dd("reporte");
        $input = \request()->all();
        $date = $input['Fecha'];
        $final = $input['Fecha_final'];
        //$date = date('Y-m-d');
        $año = date('Y');
        $añoA = date('Y', strtotime('-1 year'));
        $desglose = "SELECT
    dis.clave_distrito 'DISTRITO',
    pr.no_proyecto 'PROYECTO',
    pr.nombre 'NOMBREPROYECTO',
    gr.nombre 'ASIGNADOA',
    DATE_FORMAT(dep.fecha_deposito, '%d/%m/%Y') 'FECHA_DEPOSITO',
    dep.tipo_traslado 'TRASLADODEPOSITOORESGUARDO',
    dep.ingreso_dep_central 'INGRESODEPOSITADOACENTRAL',
    dep.ingreso_dep_cliente 'INGRESODEPOSITADOACLIENTE',
    DATE_FORMAT(dep.fecha_venta, '%d/%m/%Y') 'VENTADELDÍA',
    dep.folios_traslado 'FOLIOSTRASLADODEVALORESOVENTANILLA'
FROM
    depositos_diarios.depositos dep,
    depositos_diarios.gerentes gr,
    depositos_diarios.proyecto pr,
    depositos_diarios.distritales dis
WHERE
    dep.id_gerente = gr.id
        AND dep.id_proyecto = pr.id
        AND gr.id_distritales = dis.id
        AND pr.id_gerentes = gr.id
        AND DATE_FORMAT(fecha_deposito, '%Y-%m-%d') BETWEEN '$date' AND '$final'";
        //dd($desglose);
        $result1 = DB::SELECT($desglose);
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'DISTRITO');
        $sheet->setCellValue('B1', 'PROYECTO');
        $sheet->setCellValue('C1', 'NOMBRE PROYECTO');
        $sheet->setCellValue('D1', 'ASIGNADO A');
        $sheet->setCellValue('E1', 'FECHA DEPOSITO');
        $sheet->setCellValue('F1', 'TRASLADO, DEPOSITO O RESGUARDO');
        $sheet->setCellValue('G1', 'INGRESO DEPOSITADO A CENTRAL');
        $sheet->setCellValue('H1', 'INGRESO DEPOSITADO A CLIENTE');
        $sheet->setCellValue('I1', 'VENTA DEL DIA (dia-mes)');
        $sheet->setCellValue('J1', 'FOLIOS TRASLADO DE VALORES O VENTANILLA');


        $aDatos = array();

        $contador = 2;
        foreach ($result1 as $item) {
            $sheet->setCellValue('A' . $contador, $item->DISTRITO);
            $sheet->setCellValue('B' . $contador, $item->PROYECTO);
            $sheet->setCellValue('C' . $contador, $item->NOMBREPROYECTO);
            $sheet->setCellValue('D' . $contador, $item->ASIGNADOA);
            $sheet->setCellValue('E' . $contador, $item->FECHA_DEPOSITO);
            $sheet->setCellValue('F' . $contador, $item->TRASLADODEPOSITOORESGUARDO);
            $sheet->setCellValue('G' . $contador, $item->INGRESODEPOSITADOACENTRAL);
            $sheet->setCellValue('H' . $contador, $item->INGRESODEPOSITADOACLIENTE);
            $sheet->setCellValue('I' . $contador, $item->VENTADELDÍA);
            $sheet->setCellValue('J' . $contador, $item->FOLIOSTRASLADODEVALORESOVENTANILLA);
            $contador = $contador + 1;
        }

        //dd($aDatos, $result1);

        $writer = new Xlsx($spreadsheet);
        $nombre = "reporte-" . $date;
        $writer->save($nombre . '.xlsx');
        return response()->download(public_path($nombre . '.xlsx'))->deleteFileAfterSend(true);


        //dd("termino");
        //return Excel::download($result1, 'reporte-' . $date . '.xlsx');
    }
}
