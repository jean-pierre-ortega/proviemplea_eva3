<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactoSolicitado extends Model
{
    protected $fillable = [
        'empresa_id',
        'persona_id',
        'estado',
        'notas_admin',
        'fecha_contacto',
        'fecha_entrevista',
        'fecha_resultado',
    ];

    protected $casts = [
        'fecha_contacto' => 'date',
        'fecha_entrevista' => 'date',
        'fecha_resultado' => 'date',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
