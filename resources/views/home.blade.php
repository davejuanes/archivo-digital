@extends('layouts.app')

@section('cabecera')
    <li class="breadcrumb-home"><a href="#"> <i class="material-icons">home</i></a></li>
    <li class="breadcrumb-item"><a href="{{url('home')}}">Principal</a></li>
    {{--    <li class="breadcrumb-item active" aria-current="page">Blank</li>--}}
@endsection

@section('content')

    <div class="px-lg py-lg bg-card">
        <div class="container">
            <div class="d-flex mb-xl"><img class="avatar-lg mr-lg" src="{{asset('assets/images/avatars/003-man-1.svg')}}" alt=""/>
                <div class="w-full">
                    <div class="d-flex flex-column flex-wrap flex-sm-row align-items-sm-center mb-sm">
                        <div class="mr-xl">
                            <h4 class="m-0 d-flex align-items-center">Actualización de Nivel
                                <i class="material-icons text-18 text-primary mx-xs" data-toggle="tooltip" title="Verified">verified</i>
                            </h4>
                            <p class="m-0 text-small text-muted">Seleccione el nivel del sistema.</p>
                        </div>
                        <form role="form" method="post" class="form-horizontal" action="{{ url('rol_usuario') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="my-sm">
                                <select class="selectpicker" data-style="border" name="id_rol" title="Seleccione rol">
                                    @foreach ($listar_roles as $p)
                                        @if ($p->logueado == '1')
                                            <option value="{{ $p->pk_id_user_nivel }}" selected>
                                                {{ $p->rol }}</option>
                                        @else
                                            <option value="{{ $p->pk_id_user_nivel }}">{{ $p->rol }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-raised btn-sm btn-raised-danger"><i class="fa fa-arrows-spin"></i>Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-lg">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 mb-md">
                        <div class="row">
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-warning h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 text-white">Usuarios</p>
                                                <div class="card-title text-white m-0">5</div>
                                            </div>
                                            <i class="material-icons">settings_accessibility</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-primary h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 text-white">Clientes</p>
                                                <div class="card-title text-white m-0">3</div>
                                            </div>
                                            <i class="material-icons">emoji_people</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mb-md">
                                <div class="card bg-danger h-100">
                                    <div class="card-body d-flex align-items-center">
                                        <div class="ul-cryptocurrency-card d-flex flex-grow-1 justify-content-between align-items-center">
                                            <div>
                                                <p class="m-0 text-white">Documentos</p>
                                                <div class="card-title text-white m-0">12</div>
                                            </div>
                                            <i class="material-icons">folder_open</i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-xl">
                        <div class="card">
                            <div class="card-body pb-sm pl-0">
                                <div class="card-title mx-lg">Coin Price Last 30 Days</div>
                                <div id="cryptoCurrencyOne"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 mb-xl">
                        <div class="card">
                            <div class="card-body px-0 pb-sm">
                                <div class="card-title mx-lg">Market Depth</div>
                                <div id="cryptoCurrencyTwo"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-4 mb-md">
                <div class="ul-cryptocurrency-tab">
                    <div class="nav-pills-primary">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item mb-2"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">USDT</a>
                            </li>
                            <li class="nav-item mb-2"><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
                                                         aria-selected="false">Market Trading</a></li>
                        </ul>
                        <div class="tab-content ul-cryptocurrency-tab-scroll" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Coin</th>
                                            <th scope="col">Last Price</th>
                                            <th scope="col">Change</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>BTC</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LTC</td>
                                            <td class="text-success">7826.00</td>
                                            <td class="font-weight-semi">1.2<span class="badge badge-success ml-1">(0.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>ETH</td>
                                            <td class="text-success">3456.99</td>
                                            <td class="font-weight-semi">3.7<span class="badge badge-success ml-1">(0.7%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>DOGE</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XMR</td>
                                            <td class="text-danger">2398.54</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>ERC20</td>
                                            <td class="text-success">3456.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-success ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>CFT</td>
                                            <td class="text-danger">7826.00</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>RIF</td>
                                            <td class="text-success">4000.32</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-success ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>NEO</td>
                                            <td class="text-success">3456.99</td>
                                            <td class="font-weight-semi">1.2<span class="badge badge-success ml-1">(0.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>MXM</td>
                                            <td class="text-success">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-success ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">3400.32</td>
                                            <td class="font-weight-semi">2.4 <span class="badge badge-success ml-1">(3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">3400.32</td>
                                            <td class="font-weight-semi">2.4 <span class="badge badge-success ml-1">(3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>LSK</td>
                                            <td class="text-danger">1782.99</td>
                                            <td class="font-weight-semi">1.3<span class="badge badge-danger ml-1">(0.1%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">4000.32</td>
                                            <td class="font-weight-semi">6.4 <span class="badge badge-danger ml-1">(-3.2%)</span></td>
                                        </tr>
                                        <tr>
                                            <td>XRP</td>
                                            <td class="text-danger">3400.32</td>
                                            <td class="font-weight-semi">2.4 <span class="badge badge-success ml-1">(3.2%)</span></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Time</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Volume</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-danger">2000</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 PM</td>
                                            <td class="text-danger">7678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-success">4560</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>15:35 AM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 AM</td>
                                            <td class="text-danger">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>16:35 PM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">20.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-danger">2000</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 PM</td>
                                            <td class="text-danger">7678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-success">4560</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>15:35 AM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 AM</td>
                                            <td class="text-danger">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>16:35 PM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">20.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-danger">2000</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 PM</td>
                                            <td class="text-danger">7678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-success">4560</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>15:35 AM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 AM</td>
                                            <td class="text-danger">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>16:35 PM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">20.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-danger">2000</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 PM</td>
                                            <td class="text-danger">7678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>13:45 PM</td>
                                            <td class="text-success">4560</td>
                                            <td class="font-weight-semi">3.4789</td>
                                        </tr>
                                        <tr>
                                            <td>15:35 AM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>20:35 AM</td>
                                            <td class="text-danger">1678</td>
                                            <td class="font-weight-semi">2.345</td>
                                        </tr>
                                        <tr>
                                            <td>16:35 PM</td>
                                            <td class="text-success">1678</td>
                                            <td class="font-weight-semi">20.345</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-3 mb-md">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center flex-wrap">
                        <p class="mb-0 font-weight-normal pr-md">Buy:<span class="text-success font-weight-semi ml-1">USDT</span></p>
                        <p class="mb-0 font-weight-normal">Available:<span class="text-success font-weight-semi ml-1">0.0 USDT</span></p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price (USDT)</label>
                                <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="2233667.00"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount (BTC)</label>
                                <input class="form-control" type="number" aria-describedby="emailHelp" placeholder="placeholder"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total (BTC)</label>
                                <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="placeholder"/>
                            </div>
                            <button class="btn btn-raised-success btn-block">Buy</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-md">
                <div class="card">
                    <div class="card-header justify-content-between align-items-center flex-wrap">
                        <p class="mb-0 font-weight-normal pr-md">Sell:<span class="text-danger font-weight-semi ml-1">USDT</span></p>
                        <p class="mb-0 font-weight-normal">Available:<span class="text-danger font-weight-semi ml-1">0.0 USDT</span></p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price (USDT)</label>
                                <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="2233667.00"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Amount (BTC)</label>
                                <input class="form-control" type="number" aria-describedby="emailHelp" placeholder="placeholder"/>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total (BTC)</label>
                                <input class="form-control" type="text" aria-describedby="emailHelp" placeholder="placeholder"/>
                            </div>
                            <button class="btn btn-raised-danger btn-block">Sell</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ul-cryptocurrency-tab">
                    <div class="nav-pills-primary">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item mb-2"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home-1" role="tab" aria-controls="pills-home" aria-selected="true">Active
                                    Orders</a></li>
                            <li class="nav-item mb-2"><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile-1" role="tab" aria-controls="pills-profile"
                                                         aria-selected="false">Closed Orders</a></li>
                            <li class="nav-item mb-2"><a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact-1" role="tab" aria-controls="pills-contact"
                                                         aria-selected="false">Balance</a></li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home-1" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Time</th>
                                            <th scope="col">Buy/Sell</th>
                                            <th scope="col">Price USDT</th>
                                            <th scope="col">Amount BPS</th>
                                            <th scope="col">Opertaion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>02:45 PM</td>
                                            <td class="text-success">Buy</td>
                                            <td class="text-success">26754.90</td>
                                            <td class="text-success">0.00567</td>
                                            <td class="font-weight-semi">0.008767</td>
                                        </tr>
                                        <tr>
                                            <td>12:45 AM</td>
                                            <td class="text-danger">Sell</td>
                                            <td class="text-danger">26754.90</td>
                                            <td class="text-danger">0.00567</td>
                                            <td class="font-weight-semi">0.008767</td>
                                        </tr>
                                        <tr>
                                            <td>02:45 PM</td>
                                            <td class="text-success">Buy</td>
                                            <td class="text-success">26754.90</td>
                                            <td class="text-success">0.00567</td>
                                            <td class="font-weight-semi">0.008767</td>
                                        </tr>
                                        <tr>
                                            <td>12:45 AM</td>
                                            <td class="text-danger">Sell</td>
                                            <td class="text-danger">26754.90</td>
                                            <td class="text-danger">0.00567</td>
                                            <td class="font-weight-semi">0.008767</td>
                                        </tr>
                                        <tr>
                                            <td>02:45 PM</td>
                                            <td class="text-success">Buy</td>
                                            <td class="text-success">26754.90</td>
                                            <td class="text-success">0.00567</td>
                                            <td class="font-weight-semi">0.008767</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile-1" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="ul-cryptocurrency-tab-closed d-flex justify-content-center py-xxxl"><i class="material-icons">
                                        monetization_on
                                    </i></div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact-1" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">Currency</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Volume</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>BTC</td>
                                            <td>0.00546</td>
                                            <td>6.78906</td>
                                        </tr>
                                        <tr>
                                            <td>ETC</td>
                                            <td>0.00546</td>
                                            <td>6.78906</td>
                                        </tr>
                                        <tr>
                                            <td>GTC</td>
                                            <td>0.00546</td>
                                            <td>6.78906</td>
                                        </tr>
                                        <tr>
                                            <td>XMR</td>
                                            <td>0.00546</td>
                                            <td>6.78906</td>
                                        </tr>
                                        <tr>
                                            <td>BIT</td>
                                            <td>0.00546</td>
                                            <td>6.78906</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
