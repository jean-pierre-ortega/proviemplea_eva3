<?php

namespace App\Http\Controllers\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Persona",
    title: "Persona",
    description: "Representa a una persona registrada en ProviEmplea"
)]
class PersonaSchema
{
    #[OA\Property(type: "integer", example: 1)]
    public int $id;

    #[OA\Property(type: "string", example: "talento@ejemplo.cl")]
    public string $email;

    #[OA\Property(type: "string", example: "+56912345678")]
    public string $telefono;

    #[OA\Property(type: "string", example: "PROV001")]
    public string $codigo_talento;

    #[OA\Property(type: "string", example: "Universitaria")]
    public string $nivel_educacional;

    #[OA\Property(type: "string", example: "Ingeniería Informática")]
    public string $titulo_carrera;

    #[OA\Property(type: "integer", example: 2024)]
    public int $anio_egreso;

    #[OA\Property(type: "integer", example: 1)]
    public int $anios_experiencia;

    #[OA\Property(type: "array", items: new OA\Items(type: "string"), example: ["PHP", "Laravel"])]
    public array $competencias;

    #[OA\Property(type: "array", items: new OA\Items(type: "string"), example: ["Backend"])]
    public array $areas_experiencia;

    #[OA\Property(type: "string", example: "800000")]
    public string $rango_renta;

    #[OA\Property(type: "string", example: "Completa")]
    public string $tipo_jornada;

    #[OA\Property(type: "string", example: "Híbrida")]
    public string $modalidad;

    #[OA\Property(type: "boolean", example: false)]
    public bool $persona_discapacidad;

    #[OA\Property(type: "boolean", example: true)]
    public bool $validado;

    #[OA\Property(type: "boolean", example: true)]
    public bool $activo;
}
