<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documento;
use App\Models\Cliente;
use App\Models\Archivo;
use App\Models\Pp_descripcion_parametrica;
use DB;
use Auth;
use Brian2694\Toastr\Facades\Toastr;

class AdjuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd('create');
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

        $newAttached = new Archivo($request->all());

        $newAttached->codigo_archivador = $request->codigo_archivador;
        $newAttached->ubicacion = $request->ubicacion;
        $newAttached->fkp_tipo_documento = $request->fkp_tipo_documento;
        $newAttached->fkp_estado_documento = $request->fkp_estado_documento;
        $newAttached->fecha_archivo = $request->fecha_archivo;

        $file=$request->file("archivo_adjunto");
        $typeFile = $file->getMimeType();
        $extension = $request->file('archivo_adjunto')->getClientOriginalExtension();

        $file_name = "archivo_".time(). '.' . $extension;
        $route = public_path('archivos/'.$file_name);

        $newAttached->ruta = 'archivos/'.$file_name;
        $newAttached->fk_id_documento = $request->fk_id_documento;
        $newAttached->fk_id_cliente = $request->fk_id_cliente;
        $newAttached->fk_user = $userId;

        copy($file, $route);

        $newAttached->save();

        if ($newAttached->save()) {
            Toastr::success('Proceso almacenado correctamente.', 'Archivo cargado');
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
        dd('show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
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
        $userId = Auth::user()->id;

        $updateAttached = Archivo::find($id);

        $updateAttached->codigo_archivador = $request->codigo_archivador;
        $updateAttached->ubicacion = $request->ubicacion;
        $updateAttached->fkp_tipo_documento = $request->fkp_tipo_documento;
        $updateAttached->fkp_estado_documento = $request->fkp_estado_documento;
        $updateAttached->fecha_archivo = $request->fecha_archivo;

        $file=$request->file("archivo_adjunto");
        $typeFile = $file->getMimeType();
        $extension = $request->file('archivo_adjunto')->getClientOriginalExtension();

        $file_name = "archivo_".time(). '.' . $extension;
        $route = public_path('archivos/'.$file_name);

        $updateAttached->ruta = 'archivos/'.$file_name;
        $updateAttached->fk_id_documento = $request->fk_id_documento;
        $updateAttached->fk_id_cliente = $request->fk_id_cliente;
        $updateAttached->fk_user = $userId;

        copy($file, $route);

        $updateAttached->save();

        if ($updateAttached->save()) {
            Toastr::success('Proceso almacenado correctamente.', 'Archivo cargado');
            return redirect()->back();
        } else {
            Toastr::error('Error al procesar los datos...', 'Error');
            return redirect()->back();
        }
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
