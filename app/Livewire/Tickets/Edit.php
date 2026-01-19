<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Edit extends Component
{
    public Ticket $ticket;
    public $titulo;
    public $descripcion;
    public $prioridad;
    public $estado;

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'prioridad' => 'required|in:baja,media,alta',
    ];

    public function mount(Ticket $ticket)
    {
        // Policy Check: Only Creator or Admin
        if (Auth::id() !== $ticket->created_by && !Auth::user()->is_admin) {
            abort(403);
        }

        $this->ticket = $ticket;
        $this->titulo = $ticket->titulo;
        $this->descripcion = $ticket->descripcion;
        $this->prioridad = $ticket->prioridad;
        $this->estado = $ticket->estado;
    }

    public function update()
    {
        $this->validate();

        // Check if closing without comments
        if ($this->estado === 'cerrado' && $this->ticket->comments()->count() === 0) {
            $this->addError('estado', 'No se puede cerrar un ticket sin comentarios.');
            return; // Stop execution
        }

        $this->ticket->update([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'prioridad' => $this->prioridad,
            'estado' => $this->estado,
        ]);

        \Illuminate\Support\Facades\Log::info('Ticket actualizado: ' . $this->ticket->id . ' por ' . Auth::user()->email);

        session()->flash('message', 'Ticket actualizado exitosamente.');
        return redirect()->route('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.editar')
            ->layout('plantillas.principal');
    }
}
