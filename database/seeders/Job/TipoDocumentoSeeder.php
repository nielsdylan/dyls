<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('tipo_documentos')->insert([
            'codigo'        => 'DNI',
            'nombre'        => 'Documento Nacional de Identidad',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //1
        DB::table('tipo_documentos')->insert([
            'codigo'        => 'RUC',
            'nombre'        => 'Registro Único de Contribuyentes',
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
