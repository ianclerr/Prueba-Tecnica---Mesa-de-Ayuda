# Mesa de Ayuda (Laravel 10 + AdminPro)

Este proyecto es una plataforma de Helpdesk desarrollada como prueba práctica. Implementa un sistema completo de gestión de tickets utilizando Laravel 10 como base, integrado con la plantilla visual AdminPro para una interfaz profesional, y potenciado por MySQL para la base de datos.

## Funcionalidades Principales

El sistema cubre todos los módulos requeridos para un flujo de trabajo de soporte técnico real:

1.  **Gestión de Tickets (CRUD)**: Permite crear, ver, editar y listar tickets. El listado incluye filtros por estado y un buscador de texto completo, todo funcional sin recargar la página gracias a Livewire.
2.  **Sistema de Comentarios**: Los usuarios pueden interactuar en los tickets. Si se agrega un comentario a un ticket "Abierto", este cambia automáticamente su estado a "En Proceso" para reflejar actividad.
3.  **Dashboard de Métricas**: Visualización clara del estado del soporte con contadores de tickets (Abiertos, Cerrados, Alta Prioridad) y una tabla resumen de los últimos ingresos.
4.  **Reglas de Negocio Robustas**:
    *   Control de permisos: Solo el creador del ticket o un administrador pueden editarlo.
    *   Validación de cierre: El sistema impide cerrar un ticket si este no tiene comentarios previos.
5.  **Experiencia de Usuario (UX)**:
    *   Notificaciones tipo "Toast" para feedback instantáneo (éxito/error).
    *   Modo Oscuro integrado y persistente.
    *   Interfaz responsiva y moderna.

## Requisitos de Instalación

Para ejecutar este proyecto en local, asegúrese de tener instalado:
*   PHP 8.1 o superior
*   Composer
*   Node.js y NPM
*   MySQL

## Instrucciones de Despliegue

Siga estos pasos en su terminal para levantar el entorno:

1.  Instalar las dependencias de PHP:
    composer install

2.  Generar el archivo de configuración de entorno:
    cp .env.example .env

3.  Generar la clave de aplicación:
    php artisan key:generate

4.  Configurar la conexión a base de datos en el archivo .env:
    DB_DATABASE=mesa_ayuda
    DB_USERNAME=root
    DB_PASSWORD=

5.  Ejecutar las migraciones y cargar los datos de prueba (Seeders):
    php artisan migrate:fresh --seed

6.  Compilar los recursos de frontend:
    npm install
    npm run build

7.  Iniciar el servidor de desarrollo:
    php artisan serve

## Credenciales de Acceso

El sistema viene precargado con dos usuarios para probar los diferentes roles:

**Rol Administrador**
Email: admin@admin.com
Contraseña: password

**Rol Usuario Normal**
Email: user@user.com
Contraseña: password

## Estructura del Proyecto

*   **Modelos**: User, Ticket, TicketComment.
*   **Vistas**: Utiliza Blade con componentes Bootstrap 5 personalizados (AdminPro).
*   **Livewire**: Componentes para Dashboard, Listado de Tickets y Detalle/Comentarios, todoo en tiempo real.
*   **Tests**: Feature tests incluidos para validar la creación de tickets.
