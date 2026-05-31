<?php

namespace App\Http\Controllers;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "ProviEmplea API",
    description: "API REST para la plataforma ProviEmplea."
)]
#[OA\Server(
    url: "http://localhost:8080/api",
    description: "Servidor local"
)]
abstract class Controller
{
    //
}
