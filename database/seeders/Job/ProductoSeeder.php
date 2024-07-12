<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        DB::table('productos')->insert([
            // 'imagen'        => 'sodas',
            'codigo'        => 'PD-00001',
            'descripcion'   => 'GASEOSA COCA COLA DE 1L',
            'stock'         => 50,
            'precio'        => 2.50,
            'jerarquia_id'  => 1,
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('productos')->insert([
            // 'imagen'        => 'sodas',
            'codigo'        => 'PD-00002',
            'descripcion'   => 'GASEOSA INCA COLA 1L',
            'stock'         => 50,
            'precio'        => 2.50,
            'jerarquia_id'  => 1,
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('productos')->insert([
            // 'imagen'        => 'sodas',
            'codigo'        => 'PD-00003',
            'descripcion'   => 'CHEETOS',
            'stock'         => 50,
            'precio'        => 1.50,
            'jerarquia_id'  => 2,
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('productos')->insert([
            // 'imagen'        => 'sodas',
            'codigo'        => 'PD-00004',
            'descripcion'   => 'PILSEN',
            'stock'         => 50,
            'precio'        => 1.50,
            'jerarquia_id'  => 3,
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
        //5
        DB::table('productos')->insert([
            // 'imagen'        => 'sodas',
            'codigo'        => 'PD-00005',
            'descripcion'   => 'CUSQUEÑA',
            'stock'         => 50,
            'precio'        => 1.50,
            'jerarquia_id'  => 3,
            'estado_id'        => 1,
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
