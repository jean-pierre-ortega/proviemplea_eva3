<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $fillable = [
        'email',
        'telefono',
        'codigo_talento',
        'nivel_educacional',
        'titulo_carrera',
        'anio_egreso',
        'anios_experiencia',
        'competencias',
        'areas_experiencia',
        'rango_renta',
        'tipo_jornada',
        'modalidad',
        'cursos',
        'idiomas',
        'persona_discapacidad',
        'validado',
        'activo'

    ];

    protected $casts = [
        'competencias' => 'array',
        'areas_experiencia' => 'array',
        'cursos' => 'array',
        'idiomas' => 'array',
        'persona_discapacidad' => 'boolean',
        'validado' => 'boolean',
        'activo' => 'boolean',
    ];

    public function contactosSolicitados()
    {
        return $this->hasMany(ContactoSolicitado::class);
    }
}
