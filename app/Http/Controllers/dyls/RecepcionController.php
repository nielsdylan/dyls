<?php

namespace App\Http\Controllers\dyls;

use App\Http\Controllers\Controller;
use App\Models\Configuraciones\Cliente;
use App\Models\Configuraciones\Estado;
use App\Models\Recepcion;
use App\Models\RecepcionDetalle;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RecepcionController extends Controller
{
    //
    public function lista()
    {
        $recepciones = Recepcion::where('estado_id','!=',2)->get();
        // foreach ($recepciones as $key => $value) {
        //     return $value->habitaciones;
        // }
        // return $recepciones;
        return view('dyls.recepciones.lista', get_defined_vars());
    }

    public function listar()
    {
        $data = Recepcion::all();
        return DataTables::of($data)
            ->addColumn('estado_span', function ($data) {
                return '<span class="badge bg-'.$data->estados->color.' p-2 text-white">'.$data->estados->nombre.'</span>';
            })
            ->addColumn('accion', function ($data) {
                return
                '<div class="flex align-items-center list-user-action" >
                    <a href="#" class="btn btn-default btn-icon btn-sm editar" data-id="' . $data->id . '" data-bs-toggle="tooltip" title="Nivel" >
                        <span class="btn-inner">

                            <svg class="icon-15" width="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path>
                            </svg>

                        </span>
                    </a>

                    <a href="#" class="btn btn-default btn-icon btn-sm  ms-2 eliminar" data-id="' . $data->id . '" >
                        <span class="btn-inner">
                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor"></path>
                            </svg>
                        </span>
                    </a>

                </div>';
            })->rawColumns(['accion', 'visible_span', 'estado_span'])->make(true);
    }
    public function formulario($id){
        $recepcion = Recepcion::find($id);
        $detalle = RecepcionDetalle::where('recepcion_id',$id)->whereNotIn('estado_id',[9,8,2])->first();
        $clientes = Cliente::where('estado_id','!=',2)->get();
        $estados = Estado::whereNotIn('id',[1,2])->get();
        // return [$recepcion,$detalle];
        return view('dyls.recepciones.formulario', get_defined_vars());
        // return $id;
    }
    public function guardar(Request $request)
    {

        // try {
            $recepcion = Recepcion::firstOrNew(['id' => $request->recepcion_id]);
            $recepcion->estado_id = ((int)$request->estado_id==3?5:$request->estado_id);
            $recepcion->save();

            // $data = RecepcionDetalle::firstOrNew(['recepcion_id' => $request->recepcion_id]);
            $data = RecepcionDetalle::where('recepcion_id',$request->recepcion_id)->whereNotIn('estado_id',[9,8,2])->first();
            // return $request;exit;
            if(!$data){
                $data = new RecepcionDetalle();
            }
            $data->recepcion_id     = (int)$request->recepcion_id;
            $data->cliente_id       = $request->cliente_id;
            $data->fecha_entrada    = $request->fecha_entrada;
            $data->fecha_salida     = $request->fecha_salida;
            $data->hora_entrada     = date("H:i");
            $data->hora_salida      = $request->hora_salida;
            $data->adelanto         = $request->adelanto;
            $data->saldo            = $request->saldo;
            $data->total            = $recepcion->habitaciones->precio;
            $data->descripcion      = $request->descripcion;
            $data->estado_id        = ((int)$request->estado_id==3?5:$request->estado_id);
            $data->save();

            if(in_array($request->estado_id, [9,8,2])){
                $recepcion = Recepcion::firstOrNew(['id' => $request->recepcion_id]);
                $recepcion->estado_id = 3;
                $recepcion->save();

                // $data = RecepcionDetalle::firstOrNew(['recepcion_id' => $request->recepcion_id]);
                // $data->recepcion_id     = $request->recepcion_id;
                // $data->cliente_id       = $request->cliente_id;
                // $data->fecha_entrada    = $request->fecha_entrada;
                // $data->fecha_salida     = $request->fecha_salida;
                // $data->hora_entrada     = date("H:i");
                // $data->hora_salida      = $request->hora_salida;
                // $data->adelanto         = $request->adelanto;
                // $data->saldo            = $request->saldo;
                // $data->total            = $recepcion->habitaciones->precio;
                // $data->descripcion      = $request->descripcion;
                // $data->estado_id        = ((int)$request->estado_id==3?5:$request->estado_id);
                // $data->save();
            }

            // if ((int) $request->id == 0) {
            //     $data->fecha_registro       = date('Y-m-d H:i:s');
            //     $data->created_at           = date('Y-m-d H:i:s');
            //     $data->created_id           = Auth()->user()->id;
            //     $data->save();
            //     LogActividades::guardar(Auth()->user()->id, 3, 'REGISTRO UNA EMPRESA', $data->getTable(), NULL, $data, 'SE A CREADO UN NUEVO EMPRESA EN EL FORMULARIO ');
            // } else {
            //     $data_old = Empresas::find($request->id);
            //     $data->updated_at   = date('Y-m-d H:i:s');
            //     $data->updated_id   = Auth()->user()->id;
            //     $data->save();
            //     LogActividades::guardar(Auth()->user()->id, 4, 'MODIFICO UNA EMPRESA', $data->getTable(), $data_old, $data, 'SE A MODIFICADO UNA EMPRESA');
            // }
            $respuesta = array("titulo" => "Éxito", "mensaje" => "Se guardo con éxito", "tipo" => "success");
        // } catch (Exception $ex) {
        //     $respuesta = array("titulo" => "Error", "mensaje" => "Hubo un problema al registrar. Por favor intente de nuevo, si persiste comunicarse con su area de TI", "tipo" => "error", "ex" => $ex);
        // }
        return response()->json($respuesta, 200);
    }

    function editar($id) {
        $data = Recepcion::find($id);
        // LogActividades::guardar(Auth()->user()->id, 6, 'FORMULARIO EMPRESA', $data->getTable(), $data, NULL, 'SELECCIONO UNA EMPRESA PARA MODIFICARLO');
        return response()->json($data,200);
    }

    function eliminar($id) {
        $data = Recepcion::find($id);
        $data->estado   = 2;
        $data->save();
        // $data->delete();
        // LogActividades::guardar(Auth()->user()->id, 5, 'ELIMINO UNA EMPRESA', $data->getTable(), $data, NULL, 'ELIMINO UN REGISTRO DE LA LISTA DE EMPRESAS');
        $respuesta = array("titulo"=>"Éxito","mensaje"=>"Se elimino con éxito","tipo"=>"success");
        return response()->json($respuesta,200);
    }
}
