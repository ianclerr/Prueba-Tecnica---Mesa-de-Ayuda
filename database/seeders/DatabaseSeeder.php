<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Ticket;
use App\Models\TicketComment;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Usuario Administrador
        $admin = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
        ]);

        // 2. Usuario Normal
        $user = User::factory()->create([
            'name' => 'Ian Cler Renaud',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
        ]);

        // 3. Tickets
        $issues = [
            ['titulo' => 'Computadora no enciende', 'prioridad' => 'alta', 'descripcion' => 'Al presionar el botón de encendido no hace nada, ni luces ni ventilador.'],
            ['titulo' => 'Impresora no funciona', 'prioridad' => 'media', 'descripcion' => 'La impresora de contabilidad está atascada y parpadea una luz roja.'],
            ['titulo' => 'No puedo acceder al correo', 'prioridad' => 'alta', 'descripcion' => 'Me sale error de credenciales inválidas aunque estoy poniendo bien la clave.'],
            ['titulo' => 'Error de conexión VPN', 'prioridad' => 'media', 'descripcion' => 'Se desconecta cada 5 minutos al trabajar desde casa.'],
            ['titulo' => 'Pantalla azul al iniciar', 'prioridad' => 'alta', 'descripcion' => 'Windows muestra error CRITICAL_PROCESS_DIED al arrancar.'],
            ['titulo' => 'Solicitud de licencia Office', 'prioridad' => 'baja', 'descripcion' => 'Necesito activar Excel en la nueva laptop.'],
            ['titulo' => 'Teclado defectuoso', 'prioridad' => 'baja', 'descripcion' => 'La tecla Enter se queda pegada.'],
            ['titulo' => 'Internet muy lento', 'prioridad' => 'media', 'descripcion' => 'Las páginas tardan mucho en cargar en el departamento de ventas.'],
            ['titulo' => 'Instalar Adobe Reader', 'prioridad' => 'baja', 'descripcion' => 'Necesito ver PDFs para facturación.'],
            ['titulo' => 'Olvidé mi contraseña', 'prioridad' => 'alta', 'descripcion' => 'Necesito resetear mi clave de dominio.']
        ];

        foreach ($issues as $issue) {
            $ticket = Ticket::create([
                'titulo' => $issue['titulo'],
                'descripcion' => $issue['descripcion'],
                'prioridad' => $issue['prioridad'],
                'estado' => 'abierto',
                'created_by' => $user->id,
            ]);

        }
    }
}
