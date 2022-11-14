<?php

namespace App\Http\Controllers\registro_usuario;

use App\Http\Controllers\Controller;
use App\Models\Pp_descripcion_parametrica;
use App\Models\User;
use App\Models\User_nivel;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ListadoRolesController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pk_id = $id;
        $listar_roles = Pp_descripcion_parametrica::select('pk_id_descripcion_parametrica', 'codigo', 'descripcion', 'activo', 'fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('fk_id_parametrica', '=', '46')
            ->get();

        $listar_niveles = User::from('users as u')
            ->join('user_nivels as n', 'n.fk_id_user', '=', 'u.id')
            ->join('pp_descripcion_parametricas as d', 'd.pk_id_descripcion_parametrica', '=', 'n.fkp_rol')
            ->select('u.id', 'u.name', 'u.email', 'u.nivel', 'n.activo', 'd.descripcion as rol','n.pk_id_user_nivel')
            ->orderBy('u.name', 'asc')
            ->where('u.id', '=', $id)
            ->get();

        return view('registro_usuario.listado_roles', compact('listar_niveles', 'listar_roles', 'pk_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $buscar_id = User_nivel::select('activo')
            ->where('pk_id_user_nivel', '=', $id)
            ->first();
        $activo = $buscar_id->activo;

        $IdUsuario = Auth::user()->id;
        if ($activo == 1) {
            $update = User_nivel::find($id);
            $update->activo = '0';
            $update->fk_user = $IdUsuario;
            $update->save();
        } else {
            $update = User_nivel::find($id);
            $update->activo = '1';
            $update->fk_user = $IdUsuario;
            $update->save();
        }

        if ($update->save()) {
            Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
            return redirect()->back();
        } else {
            Toastr::error('Error al guardar datos...', 'Error');
            return redirect()->back();
        }
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
        $rol = $request->fkp_rol;

        $listar_roles = Pp_descripcion_parametrica::select('pk_id_descripcion_parametrica', 'codigo', 'descripcion', 'nivel', 'activo', 'fk_id_parametrica')
            ->orderBy('descripcion', 'asc')
            ->where('pk_id_descripcion_parametrica', '=', $rol)
            ->first();

        $nivel = $listar_roles->nivel;

        $buscar_rol = User_nivel::select('pk_id_user_nivel', 'fkp_rol', 'fk_id_user')
            ->where('fk_id_user', '=', $id)
            ->where('fkp_rol', '=', $rol)
            ->first();

        if ($buscar_rol != null) {
            Toastr::error('Ya esta registrado...', 'Error');

            return redirect()->back();
        } else {
            $IdUsuario = Auth::user()->id;
            $new = new User_nivel();
            $new->fkp_rol = $request->fkp_rol;
            $new->nivel = $nivel;
            $new->logueado = '0';
            $new->fk_id_user = $id;
            $new->fk_user = $IdUsuario;
            $new->save();

            if ($new->save()) {
                Toastr::success('Los datos se actualizaron correctamente.', 'Datos Actualizados');
                return redirect()->back();
            } else {
                Toastr::error('Error al guardar datos...', 'Error');
                return redirect()->back();
            }
        }
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
