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
                <div class="row">
                    <button class="btn btn-app btn-primary" data-toggle="modal" data-target="#addNewClient">Nuevo</button>
                    <div class="modal fade" id="addNewClient" tabindex="-1" role="dialog"
                        aria-labelledby="addNewCardModaltitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <p class="card-title m-0" id="addNewCardModaltitle">Nuevo cliente</p>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form role="form" method="post" class="form-horizontal"
                                        action="{{ url('clientes') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">person</i>
                                            </div>
                                            <input type="text" class="form-control" name="nombre"
                                                placeholder="Nombre Completo">
                                        </div>
                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">fingerprint</i>
                                            </div>
                                            <input type="number" class="form-control" name="numero_ci">

                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">phone</i>
                                            </div>
                                            <input type="text" class="form-control" name="numero_telefono">
                                        </div>

                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">email</i>
                                            </div>
                                            <input type="email" class="form-control" name="email"
                                                placeholder="nombre@correo.com">
                                        </div>

                                        <div class="input-group with-icon input-light mb-3">
                                            <div class="input-group-prepend">
                                                <i class="input-group-text material-icons">map</i>
                                            </div>
                                            <input type="text" class="form-control" name="direccion">
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
                                <th>Num</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>N??mero CI</th>
                                <th>N??mero Tel??fono</th>
                                <th>Activo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($clients as $c)
                                <tr>
                                    <td style="text-align: center">{{ $counter++ }}</td>
                                    <td>{{ $c->nombre }}</td>
                                    <td style="text-align: center">{{ $c->email }}</td>
                                    <td style="text-align: center">{{ $c->numero_ci }}</td>
                                    <td style="text-align: center">{{ $c->numero_telefono }}</td>
                                    <td style="text-align: center">
                                        @if ($c->activo == '1')
                                            <h5>Habilitato</h5>
                                        @else
                                            <h5 style="color:red;"><b>Deshabilitado</b></h5>
                                        @endif
                                    </td>
                                    <td width="200px">
                                        @if ($c->activo === 1)
                                            <a href="{{ url('casos', $c->pk_id_cliente) }}"
                                                class="btn btn-raised btn-raised-success btn-sm btn-block"><span
                                                    class="fa fa-edit"></span> Casos</a>
                                            <a href="{{ url('cliente_pdf', $c->pk_id_cliente) }}"
                                                class="btn btn-raised btn-raised-primary btn-sm btn-block"><span
                                                    class="fa fa-file"></span> Reporte</a>
                                        @endif

                                        @if ($c->activo === 1)
                                            <a href="{{ route('clientes.edit', $c->pk_id_cliente) }}"
                                                class="btn btn-raised btn-raised-warning btn-sm btn-block"
                                                onclick="return confirm('??Esta seguro de la dashabilitaci??n.?')"><span
                                                    class="fa fa-arrows-rotate"></span> Deshabilitar</a>
                                        @else
                                            <a href="{{ route('clientes.edit', $c->pk_id_cliente) }}"
                                                class="btn btn-raised btn-raised-danger btn-sm btn-block"
                                                onclick="return confirm('??Esta seguro de la habilitaci??n.?')"><span
                                                    class="fa fa-arrows-rotate"></span> Habilitar</a>
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
@endsection
