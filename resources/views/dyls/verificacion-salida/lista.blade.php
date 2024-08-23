@extends('dyls.Layouts.app-main')
@section('content')
    {{-- <div class="row">
        <div class="col-sm-12"> --}}

    <div class="row">
        @foreach ($recepciones as $key => $value)
            <div class="col-md-3">
                <a href="{{ route('dyls.verificacion-salida.formulario', ['id'=>$value->id]) }}" target="_blank" rel="noopener noreferrer">
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
                                    <input id="nombre" class="form-control form-control-sm" type="text" name="nombre"
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
    {{-- <script src="{{ asset('dyls/recepciones/recepciones-model.js') }}"></script>
    <script src="{{ asset('dyls/recepciones/recepciones-view.js') }}"></script> --}}
    <script>
        // const view = new RecepcionesView(new RecepcionesModel(token));
        // view.listar();
        // view.eventos();
    </script>
@endsection
