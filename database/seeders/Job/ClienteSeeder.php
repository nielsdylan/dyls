<?php

namespace Database\Seeders\Job;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        //1
        DB::table('clientes')->insert([
            'codigo'        => 'C74250891',
            'persona_id'    => 1,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //2
        DB::table('clientes')->insert([
            'codigo'        => 'C12345678',
            'persona_id'    => 2,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //3
        DB::table('clientes')->insert([
            'codigo'        => 'C87654321',
            'persona_id'    => 3,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
        //4
        DB::table('clientes')->insert([
            'codigo'        => 'C23145678',
            'persona_id'    => 4,
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s'),
        ]);
    }
}
