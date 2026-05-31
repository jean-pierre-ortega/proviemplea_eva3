<?php

namespace App\Http\Controllers\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "Empresa",
    title: "Empresa",
    description: "Representa a una empresa registrada en ProviEmplea"
)]
class EmpresaSchema
{
    #[OA\Property(type: "integer", example: 1)]
    public int $id;

    #[OA\Property(type: "string", example: "TechCorp SpA")]
    public string $nombre_empresa;

    #[OA\Property(type: "string", example: "76123456-7")]
    public string $rut_empresa;

    #[OA\Property(type: "string", example: "rrhh@techcorp.cl")]
    public string $email;

    #[OA\Property(type: "string", example: "contratacion-directa")]
    public string $tipo_empresa;

    #[OA\Property(type: "string", example: "Tecnología")]
    public string $rubro;

    #[OA\Property(type: "array", items: new OA\Items(type: "string"), example: ["Seguro complementario", "Trabajo remoto"])]
    public array $beneficios;

    #[OA\Property(type: "string", example: "Ana López")]
    public string $contacto_nombre;

    #[OA\Property(type: "string", example: "ana@techcorp.cl")]
    public string $contacto_email;

    #[OA\Property(type: "boolean", example: false)]
    public bool $validado;

    #[OA\Property(type: "boolean", example: true)]
    public bool $activo;
}
