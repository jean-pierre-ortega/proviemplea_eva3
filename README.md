ProviEmplea API - Evaluación Sumativa U3

ProviEmplea API es una API REST desarrollada con Laravel para gestionar personas, empresas y solicitudes de contacto dentro de una plataforma de empleo. El proyecto fue desarrollado utilizando PHP, Laravel, MySQL, Docker y Swagger para la documentación de los servicios.

El objetivo principal de esta evaluación fue documentar los distintos endpoints de la API mediante Swagger/OpenAPI, permitiendo visualizar y probar las operaciones directamente desde una interfaz web.

Durante el desarrollo se implementaron las entidades Persona, Empresa y ContactoSolicitado, además de un módulo de Administración encargado de consultar contactos y obtener estadísticas generales del sistema.

La aplicación se ejecuta utilizando contenedores Docker, lo que permite mantener un entorno de desarrollo consistente y simplifica la instalación de dependencias. Para la gestión de la base de datos se utilizó MySQL y para la documentación de la API se incorporó el paquete L5-Swagger.

Uno de los principales desafíos durante el desarrollo fue la configuración inicial de Swagger y la generación de la documentación. En algunos casos fue necesario ejecutar comandos con permisos elevados dentro del contenedor utilizando el usuario root para resolver problemas relacionados con permisos de escritura y generación de archivos de documentación.

También fue necesario crear y documentar los distintos Schemas utilizados por Swagger para representar correctamente las estructuras de datos de Personas, Empresas y ContactosSolicitados. Estos esquemas permiten visualizar los modelos de datos directamente desde Swagger UI y facilitan la comprensión de los recursos disponibles en la API.

La documentación generada permite visualizar los endpoints disponibles, los parámetros requeridos, los códigos de respuesta y ejemplos de las estructuras de datos utilizadas por cada recurso.

Para generar nuevamente la documentación Swagger se utilizó el siguiente comando:
docker compose exec app php artisan l5-swagger:generate

En algunos casos fue necesario ejecutar comandos utilizando el usuario root dentro del contenedor:
docker compose exec -u root app php artisan l5-swagger:generate

La aplicación puede ejecutarse utilizando Docker Compose mediante:
docker compose up -d

Contrato OpenAPI

La documentación Swagger fue generada utilizando L5-Swagger integrado en Laravel. El contrato OpenAPI generado automáticamente por la aplicación se encuentra en:

storage/api-docs/api-docs.json

Este archivo contiene la especificación completa de los endpoints documentados, incluyendo rutas, métodos HTTP, parámetros, respuestas, esquemas de datos y definiciones utilizadas por Swagger UI.

La documentación Swagger se encuentra disponible en:

http://localhost:8080/api/documentation

Tecnologías utilizadas:
PHP 8
Laravel 11
MySQL
Docker
Nginx
Swagger / OpenAPI (L5-Swagger)
Git
GitHub

Repositorio GitHub:https://github.com/jean-pierre-ortega/proviemplea_eva3
