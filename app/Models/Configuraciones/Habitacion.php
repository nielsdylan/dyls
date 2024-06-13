<?php

namespace App\Models\Configuraciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Habitacion extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'habitaciones';
    protected $fillable = ['nombre','nivel_id','categoria_id','tarifa_id','precio','descripcion'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado');
    }

    public function nivel(): BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
    public function tarifa(): BelongsTo
    {
        return $this->belongsTo(Tarifa::class);
    }
}
