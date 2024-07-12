<?php

namespace App\Models\configuraciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jerarquia extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'jerarquias';
    protected $fillable = ['nombre','estado_id'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'estado_id');
    }
}
