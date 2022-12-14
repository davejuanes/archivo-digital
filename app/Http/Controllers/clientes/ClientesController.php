<?php

namespace App\Http\Controllers\clientes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Auth;
use App\Models\Adjunto;
use Brian2694\Toastr\Facades\Toastr;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $clients = Cliente::from('clientes')
        ->select('*')
        ->where('fk_user', $userId)
        ->orderBy('pk_id_cliente', 'DESC')
        ->get();

        return view('clientes.clientes', compact('clients'));
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

        $newClient = new Cliente($request->all());

        $newClient->nombre = $request->nombre;
        $newClient->numero_ci = $request->numero_ci;
        $newClient->numero_telefono = $request->numero_telefono;
        $newClient->email = $request->email;
        $newClient->direccion = $request->direccion;
        $newClient->fk_user = $userId;

        $newClient->save();

        if ($newClient->save()) {
            Toastr::success('Proceso registrado correctamente.', 'Nuevo cliente registrado');
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
        //
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

        $client = Cliente::find($id);

        if ($client->activo === 1) {
            $client->activo = 0;
        } elseif ($client->activo === 0) {
            $client->activo = 1;
        }
        $client->fk_user = $userId;

        $client->save();
        
        if ($client->save()) {
            Toastr::success('Solicitud procesada correctamente.', 'Estado de usuario actualizado');
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
