<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class PersonaController extends Controller
{
        #[OA\Get(
        path: "/personas",
        tags: ["Personas"],
        summary: "Listar personas",
        description: "Retorna el listado de personas registradas en ProviEmplea.",
        responses: [
            new OA\Response(
                response: 200,
                description: "Listado de personas obtenido correctamente"
            )
        ]
    )]
    public function index(): JsonResponse
    {
        return response()->json(Persona::all());
    }


        #[OA\Post(
        path: "/personas",
        tags: ["Personas"],
        summary: "Crear persona",
        description: "Registra una nueva persona en ProviEmplea.",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                example: [
                    "email" => "talento@ejemplo.cl",
                    "telefono" => "+56912345678",
                    "codigo_talento" => "PROV002",
                    "nivel_educacional" => "Universitaria",
                    "titulo_carrera" => "Ingeniería Informática",
                    "anio_egreso" => 2024,
                    "anios_experiencia" => 1,
                    "competencias" => ["PHP", "Laravel"],
                    "areas_experiencia" => ["Backend"],
                    "rango_renta" => "800000",
                    "tipo_jornada" => "Completa",
                    "modalidad" => "Híbrida",
                    "cursos" => ["Laravel Básico"],
                    "idiomas" => ["Español"],
                    "persona_discapacidad" => false,
                    "validado" => false,
                    "activo" => true
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Persona creada correctamente"),
            new OA\Response(response: 500, description: "Error interno del servidor")
        ]
    )]

    public function store(Request $request): JsonResponse
    {
        $persona = Persona::create($request->all());

        return response()->json($persona, 201);
    }

        #[OA\Get(
        path: "/personas/{id}",
        tags: ["Personas"],
        summary: "Obtener persona por ID",
        description: "Retorna una persona específica según su ID.",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Persona encontrada"),
            new OA\Response(response: 404, description: "Persona no encontrada")
        ]
    )]

    public function show(int $id): JsonResponse
    {
        $persona = Persona::findOrFail($id);

        return response()->json($persona);
    }

       #[OA\Put(
        path: "/personas/{id}",
        tags: ["Personas"],
        summary: "Actualizar persona",
        description: "Actualiza los datos de una persona existente.",
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
                    "telefono" => "+56987654321",
                    "nivel_educacional" => "Técnica",
                    "anios_experiencia" => 2,
                    "modalidad" => "Remota"
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Persona actualizada correctamente"),
            new OA\Response(response: 404, description: "Persona no encontrada"),
            new OA\Response(response: 500, description: "Error interno del servidor")
        ]
    )]
    public function update(Request $request, int $id): JsonResponse
    {
        $persona = Persona::findOrFail($id);

        $persona->update($request->all());

        return response()->json($persona);
    }

        #[OA\Delete(
        path: "/personas/{id}",
        tags: ["Personas"],
        summary: "Eliminar persona",
        description: "Elimina una persona registrada según su ID.",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Persona eliminada correctamente"),
            new OA\Response(response: 404, description: "Persona no encontrada"),
            new OA\Response(response: 500, description: "Error interno del servidor")
        ]
    )]
    public function destroy(int $id): JsonResponse
    {
        $persona = Persona::findOrFail($id);

        $persona->delete();

        return response()->json([
            'message' => 'Persona eliminada correctamente'
        ]);
    }

        #[OA\Patch(
        path: "/personas/{id}/validar",
        tags: ["Personas"],
        summary: "Validar persona",
        description: "Marca una persona como validada.",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Persona validada correctamente"),
            new OA\Response(response: 404, description: "Persona no encontrada")
        ]
    )]
    public function validar(int $id): JsonResponse
    {
        $persona = Persona::findOrFail($id);

        $persona->validado = true;
        $persona->save();

        return response()->json($persona);
    }
}
