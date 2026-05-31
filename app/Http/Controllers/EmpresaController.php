<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;

class EmpresaController extends Controller
{
     #[OA\Get(
        path: "/empresas",
        tags: ["Empresas"],
        summary: "Listar empresas",
        description: "Retorna el listado de empresas registradas.",
        responses: [
            new OA\Response(
                response: 200,
                description: "Listado de empresas obtenido correctamente"
            )
        ]
    )]
    public function index(): JsonResponse
    {
        return response()->json(Empresa::all());
    }

      #[OA\Post(
        path: "/empresas",
        tags: ["Empresas"],
        summary: "Crear empresa",
        description: "Registra una nueva empresa.",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                example: [
                    "nombre_empresa" => "TechCorp SpA",
                    "rut_empresa" => "76123456-7",
                    "email" => "rrhh@techcorp.cl",
                    "tipo_empresa" => "contratacion-directa",
                    "rubro" => "Tecnología",
                    "beneficios" => ["Seguro complementario", "Trabajo remoto"],
                    "contacto_nombre" => "Ana López",
                    "contacto_email" => "ana@techcorp.cl",
                    "validado" => false,
                    "activo" => true
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: "Empresa creada correctamente")
        ]
    )]
    public function store(Request $request): JsonResponse
    {
        $empresa = Empresa::create($request->all());

        return response()->json($empresa, 201);
    }

        #[OA\Get(
        path: "/empresas/{id}",
        tags: ["Empresas"],
        summary: "Obtener empresa por ID",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Empresa encontrada"),
            new OA\Response(response: 404, description: "Empresa no encontrada")
        ]
    )]
    public function show(int $id): JsonResponse
    {
        $empresa = Empresa::findOrFail($id);

        return response()->json($empresa);
    }

        #[OA\Put(
        path: "/empresas/{id}",
        tags: ["Empresas"],
        summary: "Actualizar empresa",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Empresa actualizada correctamente"),
            new OA\Response(response: 404, description: "Empresa no encontrada")
        ]
    )]
    public function update(Request $request, int $id): JsonResponse
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->update($request->all());

        return response()->json($empresa);
    }

       #[OA\Delete(
        path: "/empresas/{id}",
        tags: ["Empresas"],
        summary: "Eliminar empresa",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Empresa eliminada correctamente"),
            new OA\Response(response: 404, description: "Empresa no encontrada")
        ]
    )]
    public function destroy(int $id): JsonResponse
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->delete();

        return response()->json([
            'message' => 'Empresa eliminada correctamente'
        ]);
    }

        #[OA\Patch(
        path: "/empresas/{id}/validar",
        tags: ["Empresas"],
        summary: "Validar empresa",
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Empresa validada correctamente"),
            new OA\Response(response: 404, description: "Empresa no encontrada")
        ]
    )]
    public function validar(int $id): JsonResponse
    {
        $empresa = Empresa::findOrFail($id);

        $empresa->validado = true;
        $empresa->save();

        return response()->json($empresa);
    }
}
