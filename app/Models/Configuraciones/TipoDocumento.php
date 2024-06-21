<?php

namespace App\Models\Configuraciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDocumento extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'tipo_documentos';
    protected $fillable = ['codigo', 'nombre', 'estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class, 'estado_id');
    }
}
