<?php

namespace App\Models\PuntoVenta;

use App\Models\Configuraciones\Estado;
use App\Models\configuraciones\Jerarquia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'productos';
    protected $fillable = ['imagen', 'codigo','descripcion','stock','precio','jerarquia_id','estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function jerarquia(): BelongsTo
    {
        return $this->belongsTo(Jerarquia::class,'jerarquia_id');
    }
}
