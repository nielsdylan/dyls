<?php

namespace App\Models\PuntoVenta;

use App\Models\Configuraciones\Estado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecepcionProductoVenta extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'recepcion_producto_venta';
    protected $fillable = ['cantidad', 'precio','producto_id','recepcion_id','recepcion_detalle_id','estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function producto(): BelongsTo
    {
        return $this->belongsTo(Producto::class,'producto_id');
    }
}
