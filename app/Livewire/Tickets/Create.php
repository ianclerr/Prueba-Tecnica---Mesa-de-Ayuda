<?php

namespace App\Livewire\Tickets;

use App\Models\Ticket;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $titulo;
    public $descripcion;
    public $prioridad = 'baja';

    protected $rules = [
        'titulo' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'prioridad' => 'required|in:baja,media,alta',
    ];

    public function save()
    {
        $this->validate();

        Ticket::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'prioridad' => $this->prioridad,
            'estado' => 'abierto',
            'created_by' => Auth::id(),
        ]);

        \Illuminate\Support\Facades\Log::info('Ticket creado: ' . $this->titulo . ' por ' . Auth::user()->email);

        session()->flash('message', 'Ticket creado exitosamente.');
        return redirect()->route('tickets.index');
    }

    public function render()
    {
        return view('livewire.tickets.crear')
            ->layout('plantillas.principal');
    }
}
