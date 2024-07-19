<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('estados')->insert([
            'nombre'        => 'ACTIVO',
            'descripcion'   => 'ES CUANDO EL REGISTRO SE ENCUENTRA EN CIRCULACIÓN.',
            'color'         => 'success',
            'color_exadecimal'  => '#1AA053',
            'background_color'  => '#D5EBDF',
            'text_color'        => '#1AA053',
            'border_color'      => '#1AA053',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('estados')->insert([
            'nombre'        => 'ELIMINADO',
            'descripcion'   => 'ES CUANDO EL REGISTRO NO SE ENCUENTRA EN CIRCULACIÓN.',
            'color'         => 'danger',

            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('estados')->insert([
            'nombre'        => 'DISPONIBLE',
            'descripcion'   => 'ES CUANDO LA HABITACIÓN ESTA DISPONIBLE PARA EL ALQUILER.',
            'color'         => 'success',
            'color_exadecimal'  => '#1AA053',
            'background_color'  => '#D5EBDF',
            'text_color'        => '#1AA053',
            'border_color'      => '#1AA053',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('estados')->insert([
            'nombre'        => 'RESERVACIÓN',
            'descripcion'   => 'ES CUANDO LA HABITACIÓN SE ENCUENTRA SEPARADA PARA UN CLIENTE.',
            'color'         => 'warning',
            'color_exadecimal'  => '#F16A1B',
            'background_color'  => '#FCE1D1',
            'text_color'        => '#F16A1B',
            'border_color'      => '#F16A1B',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //5
        DB::table('estados')->insert([
            'nombre'        => 'OCUPADA',
            'descripcion'   => 'ES CUANDO LA HABITACIÓN FUE ALQUILADA A UN CLIENTE.',
            'color'         => 'danger',
            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //6
        DB::table('estados')->insert([
            'nombre'        => 'LIMPIEZA',
            'descripcion'   => 'ES CUANDO LA HABITACIÓN SE RELIZA UNA LIMPIEZA .',
            'color'         => 'info',
            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //7
        DB::table('estados')->insert([
            'nombre'        => 'PAGADO',
            'descripcion'   => 'ES CUANDO LA HABITACION SE ENCUENTRA PAGADA EN SU TOTALIDAD .',
            'color'         => 'info',
            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //8
        DB::table('estados')->insert([
            'nombre'        => 'HOSPEDAJE FINALIZADO',
            'descripcion'   => 'ES CUANDO EL TIEMPO DEL ALQUILER DE LA HABITACIÓN LLEGA A SU FIN.',
            'color'         => 'info',
            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //9
        DB::table('estados')->insert([
            'nombre'        => 'RESERVA ANULADA',
            'descripcion'   => 'ES CUANDO EL CLIENTE CANCELA SU RESERVA O NO SE PRESENTO.',
            'color'         => 'danger',

            'color_exadecimal'  => '#C03221',
            'background_color'  => '#F2D6D3',
            'text_color'        => '#C03221',
            'border_color'      => '#C03221',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
