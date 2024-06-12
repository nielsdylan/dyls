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
            'nombre'        => 'Activo',
            'descripcion'   => 'Es cuanto el registro se encuentra en circulación. ',
            'color'         => 'success',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('estados')->insert([
            'nombre'        => 'Eliminado',
            'descripcion'   => 'Es cuanto el registro no se encuentra en circulación. ',
            'color'         => 'danger',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
