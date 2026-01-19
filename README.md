# Mesa de Ayuda - Laravel 10 + AdminPro

![Laravel](https://img.shields.io/badge/Laravel-10-red?logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1-blue?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8-blue?logo=mysql&logoColor=white)
![AdminPro](https://img.shields.io/badge/AdminPro-Template-purple)

---

## Descripción

Mesa de Ayuda es una mini plataforma desarrollada con **Laravel 10**, **MySQL** y el template **AdminPro**. Permite gestionar tickets de soporte con comentarios, seguimiento de estados y un dashboard que resume la actividad.

Cuenta con dos tipos de usuarios: **administrador** y **usuario normal**, cada uno con permisos específicos.

---

## Funcionalidades

### Tickets
![Tickets](https://img.shields.io/badge/Tickets-CRUD-green)
- Crear, ver, editar y cerrar tickets según permisos.  
- Filtros por estado y búsqueda por título o descripción.  
- Cambio automático de estado a `en_proceso` al agregar un comentario.  
- Acciones rápidas desde el listado para cambiar estado.  
- Listado paginado con badges de prioridad y estado.  

### Comentarios
![Comentarios](https://img.shields.io/badge/Comentarios-Livewire-blue)
- Agregar y visualizar comentarios en tickets.  
- Solo se puede cerrar un ticket si tiene al menos un comentario.  
- Compatible con Livewire: agregar comentarios sin recargar la página.  

### Dashboard
![Dashboard](https://img.shields.io/badge/Dashboard-Métricas-orange)
- Contadores de tickets: abiertos, en proceso, cerrados, alta prioridad abiertos/en proceso.  
- Últimos 10 tickets creados.  

---

## Reglas de negocio
![Seguridad](https://img.shields.io/badge/Seguridad-Roles-red)
- Solo el creador o un administrador puede editar un ticket.  
- No se puede cerrar un ticket sin comentarios.  
- Validaciones estrictas de campos obligatorios: título, descripción, prioridad y estado.  

---

## Usuarios demo

| Rol             | Email             | Password |
|-----------------|-----------------|----------|
| Administrador   | admin@admin.com   | password |
| Usuario normal  | user@user.com     | password |

> Los usuarios se crean automáticamente desde los seeders incluidos.

---

## Requisitos

![Requisitos](https://img.shields.io/badge/Requisitos-PHP_8.1-blue)
- PHP >= 8.1  
- MySQL  
- Composer  
- Node.js y npm (solo si se desea compilar assets, aunque AdminPro funciona nativo)

---

## Instalación

1. Clonar el repositorio:

```bash
git clone https://github.com/ianclerr/Prueba-Tecnica---Mesa-de-Ayuda.git
cd Prueba-Tecnica---Mesa-de-Ayuda
Instalar dependencias:

composer install
Configurar .env con los datos de la base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mesa_ayuda
DB_USERNAME=root
DB_PASSWORD=
Crear la base de datos en MySQL:

CREATE DATABASE mesa_ayuda;
Ejecutar migraciones y seeders:

php artisan migrate:fresh --seed
Iniciar el servidor:

php artisan serve
El proyecto estará disponible en http://127.0.0.1:8000.

Uso
Ingresar con los usuarios demo para probar todas las funcionalidades.

Los administradores tienen control total sobre todos los tickets.

Los usuarios normales solo pueden gestionar sus propios tickets.

El dashboard refleja los contadores y últimos tickets según el rol.

Extras implementados



Livewire para filtros y comentarios sin recargar página.

Logs de acciones del usuario para auditoría.

Modo oscuro y notificaciones tipo toast.
