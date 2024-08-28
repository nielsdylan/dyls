<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salida extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'salidas';
    protected $fillable = ['habitacion_id', 'cliente_id', 'recepcion_detalle_id', 'tipo_pago_id', 'mora_penalidad', 'precio_habitacion', 'fecha_entrada', 'fecha_salida', 'hora_entrada', 'hora_salida', 'estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
