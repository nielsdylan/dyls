@extends('dyls.Layouts.app-main')
@section('banner')
    iq-banner
@endsection
@section('css')
<!-- Fullcalender CSS -->
<link rel='stylesheet' href="{{ asset('Template/vendor/fullcalendar/core/main.css')}}">
<link rel='stylesheet' href="{{ asset('Template/vendor/fullcalendar/daygrid/main.css')}}">
<link rel='stylesheet' href="{{ asset('Template/vendor/fullcalendar/timegrid/main.css')}}">
<link rel='stylesheet' href="{{ asset('Template/vendor/fullcalendar/list/main.css')}}">
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
<div class="toast-container position-fixed bottom-0 end-0 p-3">

    <div id="toast-notificacion" class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect width="100%" height="100%" fill="#007aff"></rect>
            </svg>
            <strong class="me-auto">Bootstrap</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="ms-2 mb-1 btn-close" data-bs-dismiss="toast" aria-label="Close">
            </button>
        </div>
        <div class="toast-body" >
            Hello, world! This is a toast message.
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card  ">
                <div class="card-body">
                    <div id="calendar1" class="calendar-s calender-one"></div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="formulario-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <div class="input-group mb-3">
                                    <select class="form-select form-select-sm" id="cliente_id" >
                                        <option selected>Seleccione...</option>
                                        @foreach ($clientes as $value)
                                        <option value="{{$value->id}}"  >{{$value->persona->nro_documento . ' - ' .$value->persona->nombres }}</option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-outline-success btn-sm agregar-cliente" type="button">Agregar</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="recepcion_id">Habitaciones</label>
                                    <select id="recepcion_id" class="form-select form-select-sm mb-3 shadow-none" name="recepcion_id" required>
                                        <option value="">Seleccione...</option>
                                        @foreach ($recepciones as $value)
                                        <option value="{{$value->id}}" data-habitacion="{{$value->habitaciones->id}}">{{$value->habitaciones->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_entrada">Fecha de entrada</label>
                                    <input type="hidden" name="fecha_entrada" value="{{ date("Y-m-d") }}">
                                    <input id="fecha_entrada" class="form-control form-control-sm" type="date" name="fecha_entrada" value="{{ date("Y-m-d") }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fecha_salida">Fecha de salida</label>
                                    <input id="fecha_salida" class="form-control form-control-sm" type="date" name="fecha_salida" value="{{ date("Y-m-d",strtotime(date("Y-m-d")."+ 1 days")) }}" required>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora_entrada">Hora de entrada</label>
                                    <input id="hora_entrada" class="form-control form-control-sm" type="time" name="hora_entrada" value="{{ date("H:i") }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="hora_salida">Hora de salida</label>
                                    <input id="hora_salida" class="form-control form-control-sm" type="time" name="hora_salida" value="{{ '12:00' }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="adelanto">Adelanto</label>
                                    <input id="adelanto" class="form-control form-control-sm" type="text" name="adelanto" value="" placeholder="0.00">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="saldo">Saldo</label>
                                    <input type="hidden" name="saldo" value="">
                                    <input type="hidden" name="total" value="">
                                    <input id="saldo" class="form-control form-control-sm" type="text" placeholder="0.00" value="" disabled>
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


    <div class="modal fade" id="formulario-cliente-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="nivel-titulo">Nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="" id="guardar-cliente-modal">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" value="0">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="documento_id">Tipo de Documento</label>
                                        <select id="documento_id" class="form-select form-select-sm mb-3 shadow-none" name="documento_id" required>
                                            <option value="">Seleccione...</option>
                                            @foreach ($tipo_documentos as $value)
                                            <option value="{{$value->id}}">{{$value->codigo . ' - ' .$value->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nro_documento">N° Documento</label>
                                        <input id="nro_documento" class="form-control form-control-sm" type="text" name="nro_documento">
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido Paterno</label>
                                        <input id="apellido_paterno" class="form-control form-control-sm" type="text" name="apellido_paterno"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido Materno</label>
                                        <input id="apellido_materno" class="form-control form-control-sm" type="text" name="apellido_materno">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nombres">Nombre</label>
                                        <input id="nombres" class="form-control form-control-sm" type="text" name="nombres"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="telefono">Telefono</label>
                                        <input id="telefono" class="form-control form-control-sm" type="text" name="telefono"
                                            required>
                                    </div>
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

    <button type="button" class="btn btn-primary click-toast">Show live toast</button>

    {{-- <div id="toast-notificacion" class="toast fade hide bg-success text-white border-0 mt-3 position-fixed bottom-0 end-0 p-3" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <svg class="bd-placeholder-img rounded me-2" width="20" height="20" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img">
                <rect width="100%" height="100%" fill="#fff"></rect>
            </svg>
            <strong class="me-auto text-white">Bootstrap</strong>
            <small>11 mins ago</small>
            <button type="button" class="ms-2 mb-1 btn-close btn-close-white text-white" data-dismiss="toast" aria-label="Close">
            </button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div> --}}


    

@endsection
@section('script')

    <!-- Fullcalender Javascript -->
    <script src="{{ asset('Template/vendor/fullcalendar/core/main.js') }}"></script>
    <script src="{{ asset('Template/vendor/fullcalendar/daygrid/main.js') }}"></script>
    <script src="{{ asset('Template/vendor/fullcalendar/timegrid/main.js') }}"></script>
    <script src="{{ asset('Template/vendor/fullcalendar/list/main.js') }}"></script>
    <script src="{{ asset('Template/vendor/fullcalendar/interaction/main.js') }}"></script>
    <script src="{{ asset('Template/vendor/moment.min.js') }}"></script>
    {{-- <script src="{{ asset('Template/js/plugins/calender.js') }}"></script> --}}


    <script src="{{ asset('dyls/reservas/calendario-view.js') }}"></script>
    <script src="{{ asset('dyls/reservas/reservas-model.js') }}"></script>
    <script>
        const view = new CalendarioView(new ReservasModel(token));
        view.calendario();
        view.eventos();
    </script>
@endsection
