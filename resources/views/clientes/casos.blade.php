@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('home') }}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card-header">
                <h2 class="p-1 m-0 text-16 font-weight-semi">Lista de Clientes</h2>
                <ol>
                    <p><b>Documento o casos de:</b> {{ $clientName->nombre }}</p>
                    <p><b>Número CI:</b> {{ $clientName->numero_ci }}</p>
                    <p><b>Número teléfono:</b> {{ $clientName->numero_telefono }}</p>
                </ol>
                <div class="row">
                    <button class="btn btn-app btn-primary" data-toggle="modal" data-target="#addNewClient">Nuevo</button>
                    <div class="modal fade" id="addNewClient" tabindex="-1" role="dialog"
                        aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="card-title m-0" id="addNewCardModaltitle">Nuevo documento o caso</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" class="form-horizontal" action="{{ url('casos') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $clientName->pk_id_cliente }}" name="fk_id_cliente">
                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">pin</i>
                                            </div>
                                            <input type="text" class="form-control" name="codigo"
                                                placeholder="NUREJ u otro">
                                        </div>
                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons"><span class="material-symbols-outlined">
                                                    history_edu
                                                    </span></i>
                                            </div>
                                            <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="10" placeholder="Descripción del documento"></textarea>
                                        </div>

                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">schedule</i>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_inicio"
                                                placeholder="Fecha Inicio" required>
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">schedule</i>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_fin"
                                                placeholder="Fecha Final">
                                        </div>

                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">map</i>
                                            </div>
                                            <select class="form-control" name="fkp_estado" id="fkp_estado">
                                                <option value="">Seleccionar</option>
                                                @foreach ($estados as $e)
                                                    <option value="{{ $e->pk_id_descripcion_parametrica }}">{{ $e->descripcion }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="d-flex">
                                            <div class="flex-grow-1"></div><button type="button"
                                                class="btn btn-opacity btn-danger mr-md"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('home') }}" class="btn btn-secondary">Inicio</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table id="basicDatatable" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Contenido</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Estado</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($documentos as $d)
                                <tr>
                                    <td>{{ $d->codigo }}</td>
                                    <td>{{ $d->contenido }}</td>
                                    <td>
                                        @if ($d->fecha_inicio)
                                            {{ date('d/m/Y', strtotime($d->fecha_inicio)) }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($d->fecha_fin)
                                            {{ date('d/m/Y', strtotime($d->fecha_fin)) }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $d->estado }}
                                    </td>
                                    <td width="200px">
                                        <a href="{{ url('casos', $d->pk_id_cliente) }}" class="btn btn-raised btn-raised-success btn-sm btn-block"><span
                                                class="fa fa-edit"></span> Editar</a>
                                        <a href="{{ url('listado_roles', $d->pk_id_cliente) }}"
                                            class="btn btn-raised btn-raised-primary btn-sm btn-block"><span
                                                class="fa fa-users"></span> Adjuntar</a>

                                        <a href="" class="btn btn-raised btn-raised-warning btn-sm btn-block"
                                            data-toggle="modal" data-target="#addNewCardModal{{ $d->pk_id_cliente }}"><span
                                                class="fa fa-arrows-rotate"></span> Deshabilitar</a>
                                        <div class="modal fade" id="addNewCardModal{{ $d->pk_id_cliente }}" tabindex="-1"
                                            role="dialog" aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <p class="card-title m-0" id="addNewCardModaltitle">Deshabilitar /
                                                            Habilitar</p>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <form role="form" method="get" class="form-horizontal"
                                                            action="{{ url('listado_usuario', $d->pk_id_cliente) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf

                                                            <div class="input-group with-icon input-light mb-3">
                                                                <div class="input-group-prepend">
                                                                    <i class="input-group-text material-icons">person</i>
                                                                </div>
                                                                <input type="text" class="form-control" name="name"
                                                                    value="{{ $d->name }}" disabled>
                                                            </div>
                                                            <div class="input-group with-icon input-light mb-3">
                                                                <div class="input-group-prepend">
                                                                    <i class="input-group-text material-icons">email</i>
                                                                </div>
                                                                <input type="email" class="form-control" name="email"
                                                                    value="{{ $d->email }}" disabled>
                                                            </div>

                                                            <div class="input-group with-icon input-light mb-3">
                                                                <div class="input-group-prepend">
                                                                    <i class="input-group-text material-icons">edit</i>
                                                                </div>
                                                                <select class="form-control col-md-4" name="habilitado"
                                                                    required>
                                                                    <option selected disabled value="">Seleccionar...
                                                                    </option>
                                                                    <option value="1">Habilitado</option>
                                                                    <option value="0">Deshabilitado</option>
                                                                </select>
                                                            </div>


                                                            <div class="d-flex">
                                                                <div class="flex-grow-1"></div><button type="button"
                                                                    class="btn btn-opacity btn-danger mr-md"
                                                                    data-dismiss="modal">Cancelar</button>
                                                                <button type="submit"
                                                                    class="btn btn-flat btn-primary">Guardar</button>
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
