<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use PDF;
use DB;

class ClientePdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::from('clientes')
        ->select('*')
        ->where('pk_id_cliente', $id)
        ->first();

        $documentos = DB::table('documentos as d')
        ->join('pp_descripcion_parametricas as dp', 'dp.pk_id_descripcion_parametrica', '=', 'd.fkp_estado')
        ->select('d.*', 'dp.descripcion as estado')
        ->where('d.fk_id_cliente', $id)
        ->get();

        $archivos = DB::table('archivos as a')
        ->join('pp_descripcion_parametricas as dp', 'dp.pk_id_descripcion_parametrica', '=', 'a.fkp_tipo_documento')
        ->join('pp_descripcion_parametricas as dp1', 'dp1.pk_id_descripcion_parametrica', '=', 'a.fkp_estado_documento')
        ->select('a.*', 'dp.descripcion as tipo_documento', 'dp1.descripcion as estado_documento')
        ->where('a.fk_id_cliente', $id)
        ->get();

        $pdf = Pdf::loadView('clientes/cliente_pdf', compact('cliente', 'documentos', 'archivos'));
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
