<!DOCTYPE html>

<head>
    <base href="../../">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> - Arctic Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400|Roboto:300,400,500,700,900|Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/plugins.bundle.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/pages/session/session.v2.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.bundle.min.css')}}">
</head>

<body>
<div class="section-left">
    <div class="section-left-content">
        <h1 class="text-36 font-weight-light text-white">Sistema de Gestión de Archivos y Documentación</h1>
        <p class="mb-24 text-small">El sistema gestiona información de documentación relacionada con temas legales para el sector Jurídico</p>
{{--        <button type="button" class="btn btn-raised btn-raised-warning">Sign Up</button>--}}
    </div>
</div>
<div class="form-holder signin-2 px-xxl">
    <div data-perfect-scrollbar='' data-suppress-scroll-x='true'>
        <div class="d-flex flex-column align-items-center mt-lg mb-xxl">
            <img class="card-img-top signup" src="{{asset('assets/images/arctic-admin.svg')}}" style="height: 100px" alt="Card image cap">
            <span class="text-primary text-18 d-block font-weight-bold">Contención Digital</span>
            <span class="mb-md text-muted mb-lg d-block">Iniciar sesión con su cuenta</span>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group with-icon input-light mb-xl">
                <div class="input-group-prepend">
                    <i class="input-group-text material-icons">perm_identity</i>
                </div>
                <input type="email" class="form-control" placeholder="Correo" value="" name="email" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group with-icon input-light mb-xl">
                <div class="input-group-prepend">
                    <i class="input-group-text material-icons">lock</i>
                </div>
                <input type="password" class="form-control" placeholder="Password" value="With icon" name="password" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="mb-md custom-control custom-checkbox checkbox-primary mb-xl">
                <input type="checkbox" class="custom-control-input" id="customCheck2">
                <label class="custom-control-label" for="customCheck2">Recordar contraseña</label>
            </div>
            <button type="submit" class="btn btn-raised btn-raised-primary btn-block">Ingresar</button>
            <div class="border-bottom mt-xxl mb-lg"></div>
        </form>
    </div>
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"/>
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7"/>
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)"/>
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)"/>
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff"/>
            </g>
        </svg>
    </div>


</div>
</body>
<script src="{{asset('assets/js/vendors.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/main.bundle.min.js')}}"></script>

