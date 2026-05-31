<?php

namespace App\Http\Controllers\Schemas;

use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: "ContactoSolicitado",
    title: "Contacto Solicitado",
    description: "Representa una solicitud de contacto entre una empresa y una persona"
)]
class ContactoSolicitadoSchema
{
    #[OA\Property(type: "integer", example: 1)]
    public int $id;

    #[OA\Property(type: "integer", example: 1)]
    public int $empresa_id;

    #[OA\Property(type: "integer", example: 1)]
    public int $persona_id;

    #[OA\Property(type: "string", example: "pendiente")]
    public string $estado;

    #[OA\Property(type: "string", example: "Empresa interesada en contactar al talento")]
    public string $notas_admin;

    #[OA\Property(type: "string", example: "2026-05-31")]
    public string $fecha_contacto;

    #[OA\Property(type: "string", example: "2026-06-03")]
    public string $fecha_entrevista;

    #[OA\Property(type: "string", example: "2026-06-10")]
    public string $fecha_resultado;
}
