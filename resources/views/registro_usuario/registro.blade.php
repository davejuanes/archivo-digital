@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    <li class="breadcrumb-item active" aria-current="page">Registro</li>
@endsection

@section('content')


    <div class="container my-lg">
        <h2 class="doc-section-title" id="examples">Registro de Usuario<a class="section-link"></a></h2>
        <div class="doc-example">
            <div class="row">
                <div class="col-md-6">
                    <form role="form" method="post" action="{{url('registro_usuario')}}" class="needs-validation" novalidate  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre Completo:</label>
                            <input type="text" class="form-control" name="name" placeholder="Nombre" required pattern="[A-Za-z0-9]+">
                            <div class="valid-tooltip">Correcto!</div>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo:</label>
                            <input type="email" class="form-control" name="email" placeholder="Correo institucional" required>
                            <div class="valid-tooltip">Correcto!</div>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="contraseña" required pattern="[A-Za-z0-9]+">
                            <div class="valid-tooltip">Correcto!</div>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Repita Password:</label>
                            <input type="password" class="form-control" name="password_confirmar" placeholder="repita contraseña" required pattern="[A-Za-z0-9]+">
                            <div class="valid-tooltip">Correcto!</div>
                            <div class="invalid-feedback">Este campo es obligatorio.</div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nivel:</label>
                            <select class="form-control js-example-basic-single" name="fkp_rol" id="validationTooltip04" required>
                                <option selected disabled value="">Seleccionar...</option>
                                @foreach($listar_niveles as $l)
                                    <option value="{{$l->pk_id_descripcion_parametrica}}">{{$l->descripcion}}</option>
                                @endforeach
                            </select>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-raised-primary"><i class="fa fa-save"></i> Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
