@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado</li>
@endsection

@section('content')
    <div class="card-header">

        <button type="button" class="btn btn-raised btn-raised-primary" data-toggle="modal" data-target="#addNewCardModal"><span class="fa fa-plus-circle"></span> Adicionar</button>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-header">
                <h2 class="p-1 m-0 text-16 font-weight-semi">Lista de Usuario</h2>
            </div>

            <div class="card">
                <div class="card-body">

                    <table id="basicDatatable" class="table" style="width:100%">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Activo</th>
                            <th>opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listar_niveles as $l)
                            <tr>
                                <td>{{$l->name}}</td>
                                <td>{{$l->email}}</td>
                                <td>{{$l->rol}}</td>
                                <td>
                                    @if ($l->activo == '1')
                                        <h5>Habilidato</h5>
                                    @else
                                        <h5 style="color:red;"><b>Deshabilitado</b></h5>
                                    @endif
                                </td>
                                <td width="200px">
                                    @if($l->activo == 1)
                                        <a href="{{route('listado_roles.edit',$l->pk_id_user_nivel)}}" class="btn btn-raised btn-raised-danger btn-sm btn-block"
                                           onclick="return confirm('¿Esta seguro de Deshabilitar.?')"><span class="fa fa-arrows-rotate"></span> Deshabilitar</a>
                                    @else
                                        <a href="{{route('listado_roles.edit',$l->pk_id_user_nivel)}}" class="btn btn-raised btn-raised-success btn-sm btn-block"
                                           onclick="return confirm('¿Esta seguro de Habilitar.?')"><span class="fa fa-arrows-rotate"></span> habilitar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="addNewCardModal" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <p class="card-title m-0" id="addNewCardModaltitle">Adicionar nivel</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form role="form" method="post" class="form-horizontal" action="{{route('listado_roles.update',$pk_id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        {{--                        <input type="text" name="id" value="{{$pk_id}}" hidden>--}}
                        <label>Puede agregar mas niveles al sistema.</label>
                        <br>
                        <div class="input-group with-icon input-light mb-3">
                            <div class="input-group-prepend">
                                <i class="input-group-text material-icons">edit</i>
                            </div>
                            <select class="form-control col-md-4" name="fkp_rol" required>
                                <option selected disabled value="">Seleccionar...</option>
                                @foreach($listar_roles as $l)
                                    <option value="{{$l->pk_id_descripcion_parametrica}}">{{$l->descripcion}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="d-flex">
                            <div class="flex-grow-1"></div>
                            <button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
