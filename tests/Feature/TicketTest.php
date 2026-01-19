<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use App\Livewire\Tickets\Create;
use Tests\TestCase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function un_usuario_puede_crear_un_ticket()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        Livewire::test(Create::class)
            ->set('titulo', 'Mi problema con la impresora')
            ->set('descripcion', 'No imprime nada')
            ->set('prioridad', 'alta')
            ->call('save')
            ->assertRedirect(route('tickets.index'));

        $this->assertDatabaseHas('tickets', [
            'titulo' => 'Mi problema con la impresora',
            'prioridad' => 'alta',
            'created_by' => $user->id,
        ]);
    }

    /** @test */
    public function campos_requeridos_validacion()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(Create::class)
            ->set('titulo', '')
            ->set('descripcion', '')
            ->call('save')
            ->assertHasErrors(['titulo', 'descripcion']);
    }
}
