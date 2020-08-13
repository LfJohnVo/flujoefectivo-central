<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        (sum(ingreso_dep_central) + sum(ingreso_dep_cliente)) total_dia,
        date(fecha_deposito) as fecha_deposito
        from depositos
        where date(fecha_deposito) = '2020-08-06' GROUP BY fecha_deposito";
        $result1 = DB::SELECT($desglose);
        //dd($result1);

        return view('home')->with('desgloses', $result1);
    }
}
