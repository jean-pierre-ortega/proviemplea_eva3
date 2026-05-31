<?php

namespace App\Http\Controllers;

use App\Models\ContactoSolicitado;
use App\Models\Empresa;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class AdministracionController extends Controller
{
       #[OA\Get(
        path: "/admin/contactos",
        tags: ["Administración"],
        summary: "Listar contactos solicitados",
        description: "Retorna las solicitudes de contacto con empresa y persona asociadas.",
        responses: [
            new OA\Response(response: 200, description: "Listado de contactos obtenido correctamente")
        ]
    )]
    public function listarContactos(): JsonResponse
    {
        $contactos = ContactoSolicitado::with(['empresa', 'persona'])->get();

        return response()->json($contactos);
    }

     #[OA\Post(
        path: "/admin/contactos",
        tags: ["Administración"],
        summary: "Crear contacto solicitado",
        description: "Registra una solicitud de contacto entre una empresa y una persona.",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                example: [
                    "empresa_id" => 1,
                    "persona_id" => 1,
                    "estado" => "pendiente",
                    "notas_admin" => "Empresa interesada en contactar al talento"
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Contacto creado correctamente"),
            new OA\Response(response: 500, description: "Error interno del servidor")
        ]
    )]
    public function crearContacto(Request $request): JsonResponse
    {
        $contacto = ContactoSolicitado::create($request->all());

        return response()->json($contacto, 201);
    }

     #[OA\Patch(
        path: "/admin/contactos/{id}",
        tags: ["Administración"],
        summary: "Actualizar contacto solicitado",
        description: "Actualiza el estado o notas de una solicitud de contacto.",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                example: [
                    "estado" => "contactado",
                    "notas_admin" => "Se realizó el primer contacto"
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Contacto actualizado correctamente"),
            new OA\Response(response: 404, description: "Contacto no encontrado")
        ]
    )]
    public function actualizarEstado(Request $request, int $id): JsonResponse
    {
        $contacto = ContactoSolicitado::findOrFail($id);

        $contacto->update($request->all());

        return response()->json($contacto);
    }

     #[OA\Get(
        path: "/admin/estadisticas",
        tags: ["Administración"],
        summary: "Obtener estadísticas",
        description: "Retorna estadísticas generales de personas, empresas y contactos.",
        responses: [
            new OA\Response(response: 200, description: "Estadísticas obtenidas correctamente")
        ]
    )]
    public function estadisticas(): JsonResponse
    {
        return response()->json([
            'total_personas' => Persona::count(),
            'personas_validadas' => Persona::where('validado', true)->count(),
            'total_empresas' => Empresa::count(),
            'empresas_validadas' => Empresa::where('validado', true)->count(),
            'contactos_pendientes' => ContactoSolicitado::where('estado', 'pendiente')->count(),
            'contactos_en_proceso' => ContactoSolicitado::whereIn('estado', ['contactado', 'entrevista'])->count(),
            'contactos_exitosos' => ContactoSolicitado::where('estado', 'seleccionado')->count(),
        ]);
    }
}
