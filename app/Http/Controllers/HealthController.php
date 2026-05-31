<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class HealthController extends Controller
{
    #[OA\Get(
        path: "/health",
        tags: ["Health"],
        summary: "Verificar estado de la API",
        description: "Retorna el estado operativo de ProviEmplea API.",
        responses: [
            new OA\Response(
                response: 200,
                description: "API funcionando correctamente"
            )
        ]
    )]
    public function __invoke(): JsonResponse
    {
        return response()->json([
            'status' => 'online',
            'service' => 'ProviEmplea API',
            'version' => '1.0.0',
            'timestamp' => now()->toIso8601String(),
        ]);
    }
}
