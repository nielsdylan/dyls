<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecepcionDetalle extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'recepcion_detalles';
    protected $fillable = ['habitacion_id', 'cliente_id', 'fecha_entrada', 'fecha_salida', 'hora_entrada', 'hora_salida', 'adelanto', 'saldo', 'total', 'descripcion', 'estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    
}
