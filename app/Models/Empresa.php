<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nombre_empresa',
        'rut_empresa',
        'email',
        'tipo_empresa',
        'rubro',
        'beneficios',
        'contacto_nombre',
        'contacto_email',
        'validado',
        'activo',
    ];

    protected $casts = [
        'beneficios' => 'array',
        'validado' => 'boolean',
        'activo' => 'boolean',
    ];

    public function contactosSolicitados()
    {
        return $this->hasMany(ContactoSolicitado::class);
    }
}
