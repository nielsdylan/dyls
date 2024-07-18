@extends('dyls.Layouts.app-main')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Datos de la Habitación</h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label>
                                {{$recepcion->habitaciones->nombre}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="tarifa">Tarifa :</label>
                                {{$recepcion->habitaciones->tarifa->nombre}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="categoria">Categoría :</label>
                                {{$recepcion->habitaciones->categoria->nombre}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="precio">Precio :</label>
                                {{$recepcion->habitaciones->precio}}
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="estado">Estados :</label>
                                {{$recepcion->estados->nombre}}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="detalle">Detalle :</label>
                                {{$recepcion->habitaciones->descripcion}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h6 class="card-title">Productos</h6>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" id="guardar-venta">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Seleccione el producto para su venta</label>
                                    <select class="select2-basic-single js-states form-select form-control" name="producto_id" style="width: 100%;">
                                        <option value="">Seleccione...</option>
                                        @foreach ($productos as $value)
                                        <option value="{{$value->id}}">{{$value->descripcion}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="recepcion_id" value="{{$recepcion->id}}">
                                <input type="hidden" name="recepcion_detalle_id" value="{{$detalle->id}}">
                                <div class="custom-table-effect table-responsive border rounded">
                                    <div class="table-responsive-lg">
                                        <table id="poductos-ventas" class="table billing">
                                            <thead>
                                                <tr>

                                                    <th scope="col">Descripción</th>
                                                    <th scope="col">Cantidad</th>
                                                    <th scope="col">Precio</th>
                                                    <th class="text-end" scope="col">Sub-Total</th>
                                                    <th>-</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td data-section="total-text" colspan="4" class="text-end">Total:</td>
                                                    <td data-section="total-valor"><span data-section="total-valor">0.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td data-section="descuento-text" colspan="4" class="text-end">Descuento:</td>
                                                    <td data-section="descuento-valor"><span data-section="descuento-valor">2.00</span></td>
                                                </tr>
                                                <tr>
                                                    <td data-section="pagar-text" colspan="4" class="text-start">Monto a pagar:</td>
                                                    <td data-section="pagar-valor"><span data-section="descuento-valor">2.00</span></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- Select2 Script -->
    <script src="{{ asset('Template/js/plugins/select2.js') }}" defer></script>
    <script src="{{ asset('dyls/punto-venta/venta/venta-model.js') }}"></script>
    <script src="{{ asset('dyls/punto-venta/venta/venta-view.js') }}"></script>
    <script>
        const view = new VentaView(new VentaModel(token));
        view.listarProductosVentas();
        view.eventos();
    </script>
@endsection
