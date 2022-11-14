<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\Pp_descripcion_parametrica;
use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listar_niveles = Pp_descripcion_parametrica::select('pk_id_descripcion_parametrica', 'codigo', 'descripcion', 'activo', 'fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('fk_id_parametrica', '=', '46')
            ->get();

        return view('registro_usuario.registro', compact('listar_niveles'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $fkp_rol = $request->fkp_rol;
        $buscar_nivel = Pp_descripcion_parametrica::select('pk_id_descripcion_parametrica', 'nivel')
            ->where('pk_id_descripcion_parametrica', '=', $fkp_rol)
            ->first();
        $nivel = $buscar_nivel->nivel;

        try {
            $IdUsuario = Auth::user()->id;
            $new = new User();
            $new->name = $request->name;
            $new->email = $request->email;
            $new->nivel = $nivel;
            $new->password = bcrypt($request->password);
            $new->remember_token = $request->_token;
            $new->fk_user = $IdUsuario;
            $new->save();
            $id = $new->id;

            $new = new User_nivel();
            $new->fkp_rol = $fkp_rol;
            $new->nivel = $nivel;
            $new->logueado = '1';
            $new->fk_user = $IdUsuario;
            $new->fk_id_user = $id;
            $new->save();

            if ($new->save()) {
                Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
                return redirect()->back();
            } else {
                Toastr::error('Error al guardar datos...', 'Error');
                return redirect()->back();
            }
        }
        catch (exception $e) {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
