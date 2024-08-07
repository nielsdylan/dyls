@extends('dyls.Layouts.app-main')
@section('content')
    <div class="row">
        @foreach ($recepciones as $key => $value)
            <div class="col-md-3">
                <a href="{{ route('dyls.punto-venta.ventas.formulario', ['recepcion_id'=>$value->id]) }}" target="_blank" rel="noopener noreferrer">
                    <div class="card bg-soft-{{$value->estados->color}}">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">

                                <div class="text-start">
                                    <h2 >{{$value->habitaciones->nombre}}</h2>
                                    {{$value->habitaciones->categoria->nombre}}
                                </div>
                                <div class="bg-soft-{{$value->estados->color}} rounded p-3">
                                    <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                        <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
{{-- @section('script')
    <script src="{{ asset('dyls/punto-venta/venta/venta-model.js') }}"></script>
    <script src="{{ asset('dyls/punto-venta/venta/venta-view.js') }}"></script>
    <script>
        const view = new ProductoView(new ProductoModel(token));
        view.listar();
        view.eventos();
    </script>
@endsection --}}
