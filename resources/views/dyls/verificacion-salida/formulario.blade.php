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
                    <input type="hidden" name="habitacion_id" value="{{ $recepcion->habitaciones->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label><strong> {{$recepcion->habitaciones->nombre}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tarifa">Tarifa :</label> <strong>{{$recepcion->habitaciones->tarifa->nombre}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categoria">Categoría :</label> <strong>{{$recepcion->habitaciones->categoria->nombre}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="precio">Precio :</label> <strong>{{$recepcion->habitaciones->precio}}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Datos del Cliente</h6>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label><strong> {{$cliente->persona->apellido_paterno. ' ' .$cliente->persona->apellido_materno. ' ' .$cliente->persona->nombres}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tarifa">Documento :</label> <strong>{{$cliente->persona->nro_documento}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categoria">Telefono :</label> <strong>{{$cliente->persona->telefono}}</strong>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="precio">Correo :</label> <strong>{{$cliente->persona->telefono}}</strong>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Datos del hospedaje</h6>
                    </div>
                </div>
                <div class="card-body">
                    <input type="hidden" name="recepcion_detalle_id" value="{{ $recepcion_detalle->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Fecha y hora de entrada :</label><strong> {{$recepcion_detalle->fecha_entrada. ' ' . $recepcion_detalle->hora_entrada}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="tarifa">Fecha y hora de salida :</label> <strong>{{$recepcion_detalle->fecha_salida. ' ' . $recepcion_detalle->hora_salida}}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="categoria">Tiempo estimado :</label> <strong> </strong>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="precio">Tiempo rebasado :</label> <strong> </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-header d-flex justify-content-between">
                            <div class="header-title">

                            </div>
                        </div> --}}
                        <div class="card-body">
                            <h6 class="card-title">Costo de alojamiento</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-sm" id="table-costo-alojamiento">
                                        <thead>
                                            <tr>
                                                <th>Costo de Habitación</th>
                                                <th>Dias</th>
                                                <th>Dinero adelantado</th>
                                                <th>Mora/Penalidad</th>
                                                <th>Por pagar</th>
                                                {{-- <th>Responsable</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody data-table="costo-alojamiento-detalle">
                                            <tr>
                                                <th data-section="costo-habitacion">
                                                    <span></span><label for="">{{ number_format($recepcion_detalle->total, 2, '.', ',')  }}</label>
                                                </th>
                                                <td data-section="total-dias"><span></span><label for="">{{ $total_dias }}</label></td>
                                                <td data-section="adelanto"><span></span> <label for="">{{ number_format($recepcion_detalle->adelanto, 2, '.', ',')  }}</label></td>
                                                <td data-section="mora-penalidad"><input type="text" name="mora-penalidad" class="form-control form-control-sm" data-action="penalidad"></td>
                                                <td data-section="por-pagar"><span></span><label for="">{{ number_format((($recepcion_detalle->total*$total_dias) - $recepcion_detalle->adelanto), 2, '.', ',')  }}</label></td>
                                                {{-- <td></td> --}}
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <h6 class="card-title">Servicio de alojamiento</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-sm table-responsive-sm billing" id="data-servicios">
                                        <thead>
                                            <tr>
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Estado</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody data-table="body-servicios">
                                            @foreach ($ventas as $key=>$value)
                                                <tr>
                                                    <th data-section="descripcion">
                                                        <h6 class="mb-0">{{ $value->producto->codigo }}</h6>
                                                        <p class="mb-0">{{ $value->producto->descripcion }}</p>
                                                    </td>
                                                    <td data-section="cantidad">{{ $value->cantidad }}</td>
                                                    <td data-section="precio">{{ number_format($value->precio, 2, '.', ',') }}</td>
                                                    <td data-section="estado">{{ ($value->pagar_id==1?'PAGADO':'FALTA PAGAR') }}</td>
                                                    <td data-section="sub-total"><span></span> <label for="">{{ number_format(($value->precio * $value->cantidad), 2, '.', ',') }}</label></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot data-table="">
                                            <tr>
                                                <td data-section="total-text" colspan="4" class="text-end">Total:</td>
                                                <td data-section="total-valor"><span data-section="total-valor">0.00</span></td>
                                            </tr>
                                            <tr>

                                                <td data-section="total-text" colspan="4" class="text-end">Total a Pagar:</td>
                                                <td data-section="total-pagar"><span data-section="total-valor">0.00</span></td>
                                            </tr>
                                            <tr class="text-end">
                                                <td data-section="text-tipo-pago" colspan="4" class="text-end"></td>
                                                <td data-section="select-tipo-pago" class="pe-0 text-end">
                                                    <select name="tipo_pago_id" id="" class="form-select shadow-none form-select-sm w-auto">
                                                        <option value="" hidden>Tipo de pago</option>
                                                        @foreach($tipo_pago as $key_pago => $value_pago)
                                                        <option value="{{ $value_pago->id }}">{{ $value_pago->nombre }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="button" class="btn btn-success btn-sm" data-action="culminar-limpiar" >Culminar/Limpiar habitación</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('dyls/verificacion-salida/verificacion-salida-model.js') }}"></script>
    <script src="{{ asset('dyls/verificacion-salida/verificacion-salida-view.js') }}"></script>
    <script>
        const view = new VerificacionSalidaView(new VerificacionSalidaModel(token));
        view.sumarCostos();
        view.eventos();
    </script>
@endsection
