@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado</li>
@endsection

@section('content')





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
                            <th>Activo</th>
                            <th>opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($listar_user as $l)
                        <tr>
                            <td>{{$l->name}}</td>
                            <td>{{$l->email}}</td>
                            <td>
                                @if ($l->activo == '1')
                                    <h5>Habilidato</h5>
                                @else
                                    <h5 style="color:red;"><b>Deshabilitado</b></h5>
                                @endif
                            </td>
                            <td width="200px">
{{--                                <a href="" class="btn btn-raised btn-raised-success btn-sm btn-block"><span class="fa fa-edit"></span> Editar</a>--}}
                                <a href="{{url('listado_roles',$l->id)}}" class="btn btn-raised btn-raised-primary btn-sm btn-block"><span class="fa fa-users"></span> Cambiar Rol</a>

                                <a href="" class="btn btn-raised btn-raised-warning btn-sm btn-block" data-toggle="modal" data-target="#addNewCardModal{{$l->id}}"><span class="fa fa-arrows-rotate"></span> Deshabilitar</a>


                                <!-- Modal-->
                                <div class="modal fade" id="addNewCardModal{{$l->id}}" tabindex="-1" role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <p class="card-title m-0" id="addNewCardModaltitle">Deshabilitar / Habilitar</p>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form role="form" method="get" class="form-horizontal"
                                                      action="{{url('listado_usuario',$l->id)}}"
                                                      enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="input-group with-icon input-light mb-3">
                                                        <div class="input-group-prepend">
                                                            <i class="input-group-text material-icons">person</i>
                                                        </div>
                                                        <input type="text" class="form-control" name="name" value="{{$l->name}}" disabled>
                                                    </div>
                                                    <div class="input-group with-icon input-light mb-3">
                                                        <div class="input-group-prepend">
                                                            <i class="input-group-text material-icons">email</i>
                                                        </div>
                                                        <input type="email" class="form-control" name="email" value="{{$l->email}}" disabled>
                                                    </div>

                                                    <div class="input-group with-icon input-light mb-3">
                                                        <div class="input-group-prepend">
                                                            <i class="input-group-text material-icons">edit</i>
                                                        </div>
                                                        <select class="form-control col-md-4" name="habilitado" required>
                                                            <option selected disabled value="">Seleccionar...</option>
                                                            <option value="1">Habilitado</option>
                                                            <option value="0">Deshabilitado</option>
                                                        </select>
                                                    </div>


                                                    <div class="d-flex">
                                                        <div class="flex-grow-1"></div><button type="button" class="btn btn-opacity btn-danger mr-md" data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
