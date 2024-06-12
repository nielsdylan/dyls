<?php

namespace App\Models\Configuraciones;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'estados';
    protected $fillable = ['nombre', 'descripcion'
        // ,'created_id', 'updated_id', 'deleted_id'
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
