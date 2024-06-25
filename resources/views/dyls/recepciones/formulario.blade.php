@extends('dyls.Layouts.app-main')
@section('banner')
    iq-banner
@endsection
@section('navbar-header')
    <div class="iq-navbar-header " style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        {{-- <div>
                            <h1>Hello Qompac!</h1>
                            <p>Experience a simple yet powerful way to build Dashboards with qompac-ui.</p>
                        </div> --}}
                        {{-- <div>
                            <a href="" class="btn btn-link btn-soft-light">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.8251 15.2171H12.1748C14.0987 15.2171 15.731 13.985 16.3054 12.2764C16.3887 12.0276 16.1979 11.7713 15.9334 11.7713H14.8562C14.5133 11.7713 14.2362 11.4977 14.2362 11.16C14.2362 10.8213 14.5133 10.5467 14.8562 10.5467H15.9005C16.2463 10.5467 16.5263 10.2703 16.5263 9.92875C16.5263 9.58722 16.2463 9.31075 15.9005 9.31075H14.8562C14.5133 9.31075 14.2362 9.03619 14.2362 8.69849C14.2362 8.35984 14.5133 8.08528 14.8562 8.08528H15.9005C16.2463 8.08528 16.5263 7.8088 16.5263 7.46728C16.5263 7.12575 16.2463 6.84928 15.9005 6.84928H14.8562C14.5133 6.84928 14.2362 6.57472 14.2362 6.23606C14.2362 5.89837 14.5133 5.62381 14.8562 5.62381H15.9886C16.2483 5.62381 16.4343 5.3789 16.3645 5.13113C15.8501 3.32401 14.1694 2 12.1748 2H11.8251C9.42172 2 7.47363 3.92287 7.47363 6.29729V10.9198C7.47363 13.2933 9.42172 15.2171 11.8251 15.2171Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M19.5313 9.82568C18.9966 9.82568 18.5626 10.2533 18.5626 10.7823C18.5626 14.3554 15.6186 17.2627 12.0005 17.2627C8.38136 17.2627 5.43743 14.3554 5.43743 10.7823C5.43743 10.2533 5.00345 9.82568 4.46872 9.82568C3.93398 9.82568 3.5 10.2533 3.5 10.7823C3.5 15.0873 6.79945 18.6413 11.0318 19.1186V21.0434C11.0318 21.5715 11.4648 22.0001 12.0005 22.0001C12.5352 22.0001 12.9692 21.5715 12.9692 21.0434V19.1186C17.2006 18.6413 20.5 15.0873 20.5 10.7823C20.5 10.2533 20.066 9.82568 19.5313 9.82568Z"
                                        fill="currentColor"></path>
                                </svg>
                                Announcements
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
            <img src="{{ asset('Template/images/dashboard/top-header.png') }}" alt="header"
                class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="{{ asset('Template/images/dashboard/top-header1.png') }}" alt="header"
                class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="{{ asset('Template/images/dashboard/top-header2.png') }}" alt="header"
                class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="{{ asset('Template/images/dashboard/top-header3.png') }}" alt="header"
                class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="{{ asset('Template/images/dashboard/top-header4.png') }}" alt="header"
                class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
            <img src="{{ asset('Template/images/dashboard/top-header5.png') }}" alt="header"
                class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX" loading="lazy">
        </div>
    </div>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Datos de la habitación</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label>
                                <p>{{$recepcion->habitaciones->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tarifa">Tarifa :</label>
                                <p>{{$recepcion->habitaciones->tarifa->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="categoria">Categoría :</label>
                                <p>{{$recepcion->habitaciones->categoria->nombre}}</p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="precio">Precio :</label>
                                <p>{{$recepcion->habitaciones->precio}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="estado">Estados :</label>
                                <p>{{$recepcion->estados->nombre}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="detalle">Detalle :</label>
                                <p>{{$recepcion->habitaciones->descripcion}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Datos de hospedaje</h6>
                    </div>
                </div>
                <form action="" id="guardar">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id" value="0">
                        <input type="hidden" name="recepcion_id" value="{{$recepcion->id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cliente_id">Cliente</label>
                                    <select id="cliente_id" class="form-select  mb-3 shadow-none" name="cliente_id" required>
                                        <option value="">Seleccione...</option>
                                        @foreach ($clientes as $value)
                                        <option value="{{$value->id}}"  {{ ($detalle?($detalle->cliente_id==$value->id?'selected':''):'') }}
                                            >{{$value->persona->nro_documento . ' - ' .$value->persona->nombres }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_entrada">Fecha de entrada</label>
                                    <input type="hidden" name="fecha_entrada" value="{{ ($detalle?$detalle->fecha_entrada:date("Y-m-d")) }}">
                                    <input id="fecha_entrada" class="form-control " type="date" name="fecha_entrada" value="{{ ($detalle?$detalle->fecha_entrada:date("Y-m-d")) }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_salida">Fecha de salida</label>
                                    <input id="fecha_salida" class="form-control" type="date" name="fecha_salida" value="{{ ($detalle?$detalle->fecha_salida:date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days"))) }}" required>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_entrada">Hora de entrada</label>
                                    <input id="hora_entrada" class="form-control" type="time" name="hora_entrada" value="{{ ($detalle?$detalle->hora_entrada:date("H:i")) }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="hora_salida">Hora de salida</label>
                                    <input id="hora_salida" class="form-control" type="time" name="hora_salida" value="{{ ($detalle?$detalle->hora_salida:'12:00') }}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="adelanto">Adelanto</label>
                                    <input id="adelanto" class="form-control" type="text" name="adelanto" value="{{ ($detalle?$detalle->adelanto:'') }}" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="saldo">Saldo</label>
                                    {{-- <input type="hidden" name="saldo_total" value="{{ ($detalle?$detalle->saldo:$recepcion->habitaciones->precio) }}"> --}}
                                    <input type="hidden" name="saldo" value="{{ ($detalle?$detalle->saldo:$recepcion->habitaciones->precio) }}">
                                    <input type="hidden" name="total" value="{{ ($detalle?$detalle->total:$recepcion->habitaciones->precio) }}">
                                    <input id="saldo" class="form-control" type="text" placeholder="0.00" value="{{ ($detalle?$detalle->saldo:$recepcion->habitaciones->precio)}}" disabled>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripcion</label>
                                    <textarea id="descripcion" class="form-control" name="descripcion" >{{ ($detalle? $detalle->descripcion :'' )}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 text-end">
                                <button type="submit" class="btn btn-sm btn-success" >Guardar</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="nivel-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nivel-titulo">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="" id="guardar-modal">
                    @csrf
                    <input type="hidden" name="id" value="0">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control form-control-sm form-control form-control-sm-sm" type="text" name="nombre"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        <button type="button" class="btn btn-default btn-sm" data-bs-dismiss="modal">Cerrar</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('dyls/recepciones/recepciones-model.js') }}"></script>
    <script src="{{ asset('dyls/recepciones/recepciones-view.js') }}"></script>
    <script>
        const view = new RecepcionesView(new RecepcionesModel(token));
        // view.listar();
        view.eventos();
    </script>
@endsection
