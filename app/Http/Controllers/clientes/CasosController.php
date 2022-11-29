<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Cliente;
use App\Models\Pp_descripcion_parametrica;
use DB;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class CasosController extends Controller
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
        $userId = Auth::user()->id;

        $newCaso = new Documento($request->all());

        $newCaso->codigo = $request->codigo;
        $newCaso->contenido = $request->contenido;
        $newCaso->fecha_inicio = $request->fecha_inicio;
        $newCaso->fecha_fin = $request->fecha_fin;
        $newCaso->fkp_estado = $request->fkp_estado;
        $newCaso->fk_id_cliente = $request->fk_id_cliente;
        $newCaso->fk_user = $userId;

        $newCaso->save();

        if ($newCaso->save()) {
            Toastr::success('Proceso registrado correctamente.', 'Nuevo documento o caso registrado');
            return redirect()->back();
        } else {
            Toastr::error('Error al procesar los datos...', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userId = Auth::user()->id;

        $clientName = Cliente::from('clientes')
        ->select('pk_id_cliente', 'nombre', 'numero_ci', 'numero_telefono')
        ->where('pk_id_cliente', $id)
        ->first();

        $documentos = Documento::from('documentos')
        ->join('pp_descripcion_parametricas as dp', 'dp.pk_id_descripcion_parametrica', '=', 'documentos.fkp_estado')
        ->select('documentos.codigo', 'documentos.contenido', 'documentos.fecha_inicio', 'documentos.fecha_fin', 'dp.descripcion as estado')
        ->where('documentos.activo', 1)
        ->get();

        $estados = Pp_descripcion_parametrica::from('pp_descripcion_parametricas')
        ->select('pk_id_descripcion_parametrica', 'descripcion')
        ->where('fk_id_parametrica', 47)
        ->get();

        return view('clientes.casos', compact('documentos', 'clientName', 'estados'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userId = Auth::user()->id;

        $updateCaso = Documento::find($id);

        $updateCaso->codigo = $request->codigo;
        $updateCaso->contenido = $request->contenido;
        $updateCaso->fecha_inicio = $request->fecha_inicio;
        $updateCaso->fecha_fin = $request->fecha_fin;
        $updateCaso->fkp_estado = $request->fkp_estado;
        $updateCaso->fk_id_cliente = $request->fk_id_cliente;

        $updateCaso->save();

        if ($updateCaso->save()) {
            Toastr::success('Proceso modificado correctamente.', 'Documento o caso modificado');
            return redirect()->back();
        } else {
            Toastr::error('Error al procesar los datos...', 'Error');
            return redirect()->back();
        }
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
