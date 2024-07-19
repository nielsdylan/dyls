<?php

namespace App\Models;

use App\Models\Configuraciones\Estado;
use App\Models\Configuraciones\Habitacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recepcion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'recepciones';
    protected $fillable = ['habitacion_id', 'estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'estado_id');
    }
    public function habitaciones(): BelongsTo
    {
        return $this->belongsTo(Habitacion::class,'habitacion_id');
    }
    public function detalle(): HasOne
    {
        return $this->hasOne(RecepcionDetalle::class)->whereNotIn('estado_id',[9,8,2]);
    }
}
